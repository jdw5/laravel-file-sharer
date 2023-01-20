<template>
    <AppLayout>
        <div>
            <div class="mb-8">
                <Uploader>
                </Uploader>
            </div>
            <div>
                <h2 class="font-mediun pb-3 border-b-2 text-gray-700">
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
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import AppFile from '@/Components/AppFile.vue'
import Uploader from '@/Components/Uploader.vue'

const props = defineProps({
    files: Array
})

</script>

<style>

</style>