<template>
    <input type="file" name="file" id="file" ref="file" multuple>
</template>

<script>
import * as Filepond from 'filepond';
export default {
    mounted() {
        const pond = Filepond.create(this.$refs.file)


    },

}
</script>

<style>

</style>