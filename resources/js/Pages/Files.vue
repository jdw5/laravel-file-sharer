<template>
{{ response }}
    <AppLayout>
        <div>
            <div class="mb-8">
                <Uploader>
                </Uploader>
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
                        No files
                    </p>
                </template>
            </div>
        </div>
        <button @click="send">Click me</button>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import AppFile from '@/Components/AppFile.vue'
import Uploader from '@/Components/Uploader.vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    files: Array,
    response: Object
})

const send = () => {
    router.post('/files/signed',
        {
            name: 'name',
            extension: 'png'
        }
    )
}
</script>

<style>

</style>