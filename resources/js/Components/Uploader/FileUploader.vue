<template>
    <div>
        <UploadForm @fileSelected="handleFileSelected" />
        <UploadedFile v-for="(upload, index) in uploads"
            :key="index"
            :upload="upload"
            :baseUrl="options.baseUrl"
        />
        {{ options }}
            
    </div>
</template>

<script>
import UploadForm from '@/Components/Uploader/UploadForm.vue'
import UploadedFile from '@/Components/Uploader/UploadedFile.vue'

export default {
    components: {
        UploadForm,
        UploadedFile,
    },

    data() {
        return {
            uploads: []
        }
    },

    props: {
        options: {
            required: false,
            type: Object,
            default() {
                return {
                    baseUrl: ''
                }
            }
        },

        endpoints: {
            required: false,
            type: Object
        }
    },

    methods: {
        handleFileSelected(files) {
            this.uploads.push(...Array.from(files).map((file) => {
                return {
                    file
                }
            }))
        }
    }

}
</script>

<style>

</style>