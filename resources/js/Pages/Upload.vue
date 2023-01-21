<template>
    <AppLayout>
        <FileUploader />
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import FileUploader from '@/Components/Uploader/FileUploader.vue';
export default {
    components: {
        AppLayout,
        FileUploader
    },


}
</script>

<style>

</style>