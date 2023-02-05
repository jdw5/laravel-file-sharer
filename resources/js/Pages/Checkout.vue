<template>
    <AppLayout>
        <form @submit.prevent="submit">
            <div class="mb-6">
                <InputLabel for="name" value="name" />
                <TextInput v-model="formName"
                    id="name"
                 />
            </div>
            <div class="mb-6">
                <InputLabel for="card" value="card" />
                <div id="card" ref="card"></div>
            </div>
            <PrimaryButton type="submit">
                Purchase
            </PrimaryButton>
        </form>
        {{ page.props.auth.user }}
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import AppFile from '@/Components/AppFile.vue'
import AppPlan from '@/Components/AppPlan.vue'
import Uploader from '@/Components/Uploader.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import { router, usePage, Link } from '@inertiajs/vue3'
import { reactive, computed, onMounted, ref } from 'vue'


const props = defineProps({
    plan: Object,
    intent: Object,
    stripeKey: String
})

const page = usePage()
const stripe = Stripe(props.stripeKey)
const elements = stripe.elements()
const cardElement = elements.create('card')

const storeFile = (file) => {
    router.post('/files',
    {
        name: file.filename,
        size: file.fileSize,
        path: file.serverId
    })
}

const card = ref(null)
const formName = ref('Joshua')
onMounted(() => {
    cardElement.mount(card.value)
})

const createSubscription = (setupIntent) => {
    router.post('/subscription', {
        plan: props.plan.data.slug,
        token: setupIntent.payment_method
    })

}
const submit = async() => {
    await stripe.confirmCardSetup(
        props.intent.client_secret, {
            payment_method: {
                card: cardElement,
                billing_details: {
                    name: formName.value,
                },
            },
        }
    ).then((result) => {
        if (result.error) {
            console.log(result)
        } else {
            createSubscription(result.setupIntent)
        }
    })
}


</script>

<style>

</style>