<template>
    <div class="flex items-center justify-between border-b-2 border-gray-100 last:border-b-0">
        <div class="w-1/2 text-sm truncate overflow-ellipsis">
            {{ file.name }}
        </div>
        <div class="flex items-center -mr-3">
            <AppFileLink :file="file" />
            <button @click="deleteFile" class="inline-block p-3 text-sm font-medium text-pink-500">
                Delete
            </button>
        </div>
    </div>
</template>

<script>
import { router } from '@inertiajs/vue3';
import AppFileLink from '@/Components/AppFileLink.vue';
export default {
    components: {
        AppFileLink
    },

    props: {
        file: {
            required: true,
            type: Object
        },
    },

    methods: {
        deleteFile() {
            if (window.confirm('Are you sure you want to delete this file?')) {
                router.delete(`/files/${this.file.uuid}`)
            }
        }
    }

}
</script>

<style>

</style>