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
                        >
                        <label class="flex-grow" :for="`plan_${plan.slug}`">
                            <AppPlan :plan="plan" />
                        </label>
                    </div>
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
import { router, usePage, Link, useForm } from '@inertiajs/vue3'
import { reactive, computed, onMounted, ref } from 'vue'


const props = defineProps({
    plans: Object,
    currentPlan: String,
})

const form = useForm({
    plan: null,
})
const page = usePage()

const swap = () => {

}


</script>

<style>

</style>