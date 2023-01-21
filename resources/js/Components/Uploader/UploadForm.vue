<template>
    <form enctype="multipart/form-data"
        novalidate
        class="relative flex items-center justify-center p-12 mb-6 border-2 border-indigo-500 border-dashed rounded-lg"
        :class="{
            'border-indigo-700 bg-gray-100 dark:bg-gray-800' : dragging
        }"
        @dragover.prevent="handleDragOver"
        @dragleave.prevent="handleDragLeave"
    >
        <input type="file" multiple
            class="absolute inset-0 w-full h-full opacity-0"
            @change="fileSelected"
        >
        <div class="text-gray-700">
            Drop here to upload or <span class="text-indigo-500 hover:underline">browse</span>
        </div>
    </form>
</template>

<script>
export default {
    emits: ['fileSelected'],

    data() {
        return {
            dragging: false,
        }
    },
    
    methods: {
        fileSelected(e) { 
            this.$emit('fileSelected', e.target.files)
        },

        handleDragOver(e) {
            this.dragging = true
        },

        handleDragLeave(e) {
            this.dragging = false
        }
    }

}
</script>

<style>

</style>