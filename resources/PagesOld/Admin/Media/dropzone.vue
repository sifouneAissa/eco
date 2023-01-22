


<template>
    <vueDropzone v-on:vdropzone-sending="sendingEvent"
                 v-on:vdropzone-removed-file="removeFile"
                 v-on:vdropzone-success="success"
                 ref="myVueDropzone"
                 id="dropzone"
                 :options="dropzoneOptions"
                 :useCustomSlot=true
    >
        <div class="dropzone-custom-content">
            <h1><i class='feather-upload-cloud'></i></h1>
            <h3 class="dropzone-custom-title">Drag and drop to upload content!</h3>
            <div class="subtitle">...or click to select a file from your computer</div>
        </div>
    </vueDropzone>
</template>

<script>

    import vueDropzone from 'vue2-dropzone-vue3'
    import {Inertia} from "@inertiajs/inertia";

    export default {
        name: "dropzone",
        props : ['model','model_id','routeToRefresh','url','doRefresh'],
        components : {
            vueDropzone,
        },
        methods: {
            sendingEvent(file, xhr, formData) {
                formData.append('_token', this.csrf);
                formData.append('model', this.model);
                formData.append('model_id', this.model_id);
            },
            removeFile(file, xhr, formData) {
            },
            success(file, xhr, formData) {
                if(this.doRefresh){
                let route = this.routeToRefresh ? this.routeToRefresh : 'admin.media.index';
                Inertia.visit(this.route(route, {
                    model: this.model,
                    model_id: this.model_id
                }), {
                    only: ['medias']
                })
                }

                this.$emit('fileUploaded');
            }
        },
        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                dropzoneOptions: {
                    url: this.url ? this.url : this.route('admin.media.store',{
                        model : this.model
                    }),
                    thumbnailWidth: 150,
                    maxFilesize: 2,
                    addRemoveLinks: true,
                    dictInvalidFileType: "upload only JPG/PNG",
                    dictMaxFilesExceeded: "Maximum upload limit reached",
                    parallelUploads: 10,
                    acceptedFiles: ".jpg, .jpeg,.png",
                    dictRemoveFile: "Clear file",
                    dictUploadCanceled: 'Cancel upload'
                }
            }
        }
    }
</script>

<style scoped>

</style>
