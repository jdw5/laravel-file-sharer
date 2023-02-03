<template>
    <input type="file" name="file" id="file" ref="file" multuple>
</template>

<script>
import * as Filepond from 'filepond';
import { router } from '@inertiajs/vue3'
import axios from 'axios';


export default {
    emits: ['onprocessfile', 'validation'],

    mounted() {
        const pond = Filepond.create(this.$refs.file, {
            allowRevert: false,
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort) => {
                    this.$emit('validation', null)

                    let form = new FormData()
                    const cancelTokenSource = axios.CancelToken.source();
                    
                    axios.post('/files/signed', {
                        name: metadata.fileInfo.name,
                        extension: metadata.fileInfo.extension,
                        size: metadata.fileInfo.size
                    }).then((response) => {
                        file.additionalData = response.data.additionalData

                        for (let field in file.additionalData) {
                            form.append(field, file.additionalData[field])
                        }

                        form.append('file', file)
                        // console.log(file)
                        axios.post(response.data.attributes.action, form, {
                            onUploadProgress (e) {
                                progress(e.lengthComputable, e.loaded, e.total)
                            },

                            cancelToken: cancelTokenSource.token
                        }).then(() => {
                            load(`${file.additionalData.key}`)
                        })
                    }).catch((e) => {
                        if (e.response.status === 422) {
                            this.$emit('validation', e.response.data)
                        }

                        abort()
                    })

                    return {
                        abort: () => {
                            cancelTokenSource.cancel()
                            abort()
                        }
                    }
                }  
                
            },

            onprocessfile: (error, file) => {
                if (error) return

                pond.removeFile(file)

                this.$emit('onprocessfile', file)
            },

            onaddfile: (error, file) => {
                if (error) {
                    return
                }
                
                file.setMetadata('fileInfo', {
                    name: file.filenameWithoutExtension,
                    extension: file.fileExtension,
                    size: file.fileSize
                })
            }
        })


    },

}
</script>

<style>

</style>