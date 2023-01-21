<template>
    <div>
        <UploadForm @fileSelected="handleFileSelected" />
    </div>
</template>

<script>
import UploadForm from '@/Components/Uploader/UploadForm.vue'
export default {
    components: {
        UploadForm,
    },

    methods: {
        handleFileSelected(files) {
            console.log(files)
        }
    }

}
</script>

<style>

</style>