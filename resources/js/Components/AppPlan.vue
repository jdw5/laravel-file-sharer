<template>
    <div class="border shadow border-gray-200 rounded-lg px-6 py-4 flex items-center justify-between">
        <div class="flex items-center">
            <h2 class="font-bold text-lg mr-4 text-indigo-500">
                {{ plan.name }}
            </h2>
            <span class="text-sm text-gray-80">
                {{ storage }}
            </span>
        </div>
        <span class="font-medium">
            ${{ price }} / month
        </span>
    </div>
  
</template>

<script setup>
import { filesize } from 'filesize'
import { computed } from 'vue'

const props = defineProps({
    plan: {
        required: true,
        type: Object
    }
})

const storage = computed(() => {
    return filesize(props.plan.storage)
})

const price = computed(() => {
    return parseInt(props.plan.price, 10) / 100
})

</script>

<style>

</style>