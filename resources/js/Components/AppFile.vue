<template>
    <div class="flex items-center justify-between border-b-2 border-gray-100 last:border-b-0">
        <div class="text-sm truncate overflow-ellipsis w-1/2">
            {{ file.name }}
        </div>
        <div class="flex items-center -mr-3">
            <a href="" class="inline-block text-sm p-3 text-indigo-500 font-medium">
                Shareable link
            </a>
            <a href="" class="inline-block text-sm p-3 text-pink-500 font-medium">
                Delete
            </a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        file: {
            required: true,
            type: Object
        },
    }

}
</script>

<style>

</style>