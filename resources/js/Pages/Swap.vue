<template>
    <AppLayout>
        <div>
            <form action="">
                <div class="mb-6">
                    <AppPlan v-for="plan in plans.data" :key="plan.slug" :plan="plan" />
                </div>
                <PrimaryButton type="submit">
                    Change
                </PrimaryButton>
            </form>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import AppPlan from '@/Components/AppPlan.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { router, usePage, Link } from '@inertiajs/vue3'
import { reactive, computed, onMounted, ref } from 'vue'


const props = defineProps({
    plans: Object,
})

const page = usePage()


const card = ref(null)
const formName = ref('Joshua')



</script>

<style>

</style>