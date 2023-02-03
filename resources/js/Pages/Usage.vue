<template>
    <AppLayout>
        <div>
            <div>
                {{ usageFormatted }} of {{ storageFormatted }}
            </div>
            <div>
                {{ usePercent }} %
            </div>

            {{ usage }}            
        </div>
    </AppLayout>
</template>

<script setup>
import { computed } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from '@inertiajs/vue3'
import { filesize } from 'filesize'

const props = defineProps({
    usage: Number,
    plan: Object
})

const usePercent = computed(() => {
    return Math.round((props.usage / props.plan.data.storage)*100)/100
})

const usageFormatted = computed(() => {
    return filesize(props.usage)
})

const storageFormatted = computed(() => {
    return filesize(props.plan.data.storage)
})

</script>

<style>

</style>