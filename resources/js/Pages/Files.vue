<template>
    <AppLayout>
        {{ props.files }}
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    files: Array
})

</script>

<style>

</style>