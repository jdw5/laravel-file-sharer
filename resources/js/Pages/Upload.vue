<template>
    <AppLayout>
        {{ $page.props.auth }}
        <FileUploader 
            :options="{
                baseUrl: '',
            }"
            :endpoints="{
                'image/png' : ''
            }"
        />
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