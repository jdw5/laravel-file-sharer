<template>
    <AppLayout>
        <div>
            <form @submit.prevent="swap">
                {{ form.plan }}
                <div class="mb-6">
                    <div class="mb-2 flex items-center gap-x-8"
                        v-for="plan in plans.data" :key="plan.slug"
                    >
                        <input type="radio" name="plan" :id="`plan_${plan.slug}`"
                            v-model="form.plan" :value="plan.slug"
                            v-if="availablePlans.find(p => p.slug === plan.slug)"
                        >
                        <label class="flex-grow" :for="`plan_${plan.slug}`">
                            <AppPlan :plan="plan" />
                        </label>
                    </div>
                </div>
                <PrimaryButton type="submit" v-if="availablePlans.length">
                    Change
                </PrimaryButton>
                <p v-else class="text-sm">
                    No available plans for you to swap to as you have too much storage.
                </p>
            </form>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import AppPlan from '@/Components/AppPlan.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { router, usePage, Link, useForm } from '@inertiajs/vue3'
import { reactive, computed, onMounted, ref } from 'vue'


const props = defineProps({
    plans: Object,
    upgrades: Object,
    currentPlan: Object,
})

const form = useForm({
    plan: null,
})
const page = usePage()

const swap = () => {
    router.patch('/subscription', form)
}

const availablePlans = computed(() => {
    return props.plans.data.filter(p => p.slug !== props.currentPlan.slug && props.upgrades[p.slug]  )
})


</script>

<style>

</style>