<template>
    <a href="" @click.prevent="getLink" class="inline-block p-3 text-sm font-medium text-indigo-500">
        Shareable link
    </a>
</template>

<script>
import axios from 'axios'
export default {
    props: {
        file: {
            type: Object,
            required: true
        }
    },

    methods: {
        async getLink() {
            let response = await axios.post(`files/${this.file.uuid}/links`)
            console.log(response)

        }
    }

}
</script>

<style>

</style>