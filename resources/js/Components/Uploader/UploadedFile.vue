<template>
    <div class="flex items-stretch p-4 mb-1 bg-white rounded-lg">
        <div>
            
        </div>
        <div class="flex flex-col justify-between">
            <div class="mb-2">
                <h1 class="mr-3 font-medium leading-tight text-gray-700">
                    {{ upload.file.name }}
                </h1>
                <div class="text-xs leading-tight text-gray-600">
                    {{ fileSize }}
                </div>
            </div>
            <div class="text-sm text-gray-600 align-baseline">
                Cancelled
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        upload: {
            required: true,
            type: Object
        },
        baseUrl: {
            required: true,
            type: String
        }
    },

    computed: {
        fileSize() {
            return `${(this.upload.file.size / 1000).toFixed(2)} KB`
        }
    },
}
</script>
