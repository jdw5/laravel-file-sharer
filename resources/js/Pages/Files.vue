<template>
    <AppLayout>
        <div>
            <div class="mb-8">
                <Uploader @onprocessfile="storeFile" 
                />
                <!-- <div v-if="errors" class="text-red-500 pt-2">

                    {{ errors.message }}
                </div> -->
            </div>
            <div>
                <h2 class="pb-3 text-gray-700 border-b-2 font-mediun">
                    Your Files
                </h2>
                <template v-if="files.data.length">
                    <AppFile v-for="file in files.data"
                        :key="file.uuid"
                        :file="file"
                    />
                </template>
                <template v-else>
                    <p class="mt-3 text-sm text-gray-900">
                        No files.
                    </p>
                </template>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import AppFile from '@/Components/AppFile.vue'
import Uploader from '@/Components/Uploader.vue'
import { router, usePage } from '@inertiajs/vue3'
import { reactive } from 'vue'

const props = defineProps({
    files: Object,
    response: Object
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

// const errors = reactive()

// const setValidationErrors = (message) => {
//     errors = message

// }
</script>

<style>

</style>