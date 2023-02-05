<template>
    <AppLayout>
        <div>
            <h2 class="pb-3 text-gray-700 border-b-2 font-mediun">
                Subscription
            </h2>
            <div class="mt-3 text-sm">
                <p>
                    You're on the {{plan.name}} plan.
                </p>
                <Link :href="route('user.account.swap')" class="pt-4 block text-indigo-500">
                    Change Plan
                </Link>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { router, usePage, Link } from '@inertiajs/vue3'
import { reactive, computed, onMounted, ref } from 'vue'


const props = defineProps({
    plan: Object,
})

const page = usePage()


const card = ref(null)
const formName = ref('Joshua')



</script>

<style>

</style>