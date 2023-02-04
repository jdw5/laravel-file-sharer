<template>
    <AppLayout>
        <div class="space-y-2">
            <Link v-for="plan in plans.data"
                :key="plan.slug"
                :href="route('checkout', plan.slug)"
            >
                <AppPlan 
                    :plan="plan"
                />
            </Link>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import AppFile from '@/Components/AppFile.vue'
import AppPlan from '@/Components/AppPlan.vue'
import Uploader from '@/Components/Uploader.vue'
import { router, usePage, Link } from '@inertiajs/vue3'
import { reactive, computed } from 'vue'

const props = defineProps({
    plans: Object,
})

const page = usePage()

const storeFile = (file) => {
    router.post('/files',
    {
        name: file.filename,
        size: file.fileSize,
        path: file.serverId
    })
}

</script>

<style>

</style>