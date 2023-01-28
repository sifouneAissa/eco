<script >
    import Editor from '@tinymce/tinymce-vue'
    export default {
        props : ['initValue'],
        components : {
            Editor
        },
        watch : {
            value : function (o,n) {
                this.$emit('Writing',this.value)
            }
        },
        methods : {
        },
        data (){
            return {
                 value : this.initValue ? this.initValue : null,
                 init : {
                    plugins: 'lists link image table code help wordcount image code fullscreen',
                    file_picker_types: 'image',
                    toolbar: 'undo redo | link image | fullscreen | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | help',
                    image_title: false,
                    /* enable automatic uploads of images represented by blob or data URIs*/
                    automatic_uploads: true,
                    paste_data_images: true, browser_spellcheck: true,
                    selector: 'textarea',
                    file_picker_callback: function (cb, value, meta) {
                        var input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');

                        /*
                          Note: In modern browsers input[type="file"] is functional without
                          even adding it to the DOM, but that might not be the case in some older
                          or quirky browsers like IE, so you might want to add it to the DOM
                          just in case, and visually hide it. And do not forget do remove it
                          once you do not need it anymore.
                        */

                        input.onchange = function () {
                            var file = this.files[0];

                            var reader = new FileReader();
                            reader.onload = function () {
                                /*
                                  Note: Now we need to register the blob in TinyMCEs image blob
                                  registry. In the next release this part hopefully won't be
                                  necessary, as we are looking to handle it internally.
                                */
                                var id = 'blobid' + (new Date()).getTime();
                                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                                var base64 = reader.result.split(',')[1];
                                var blobInfo = blobCache.create(id, file, base64);
                                blobCache.add(blobInfo);

                                /* call the callback and populate the Title field with the file name */
                                cb(blobInfo.blobUri(), {title: file.name});
                            };
                            reader.readAsDataURL(file);
                        };

                        input.click();
                    },
                    setup: function (editor) {
                        editor.on('init', function (event) {

                            $(editor.getBody().parentNode).bind('drag drop', function (e) {
                                /* your magic code here */
                            });

                        });
                        editor.on("input", function (e) {
                        })
                        editor.on('change', function (data) {
                            tinymce.triggerSave();
                        });
                    }
                }
            }
        },
        mounted() {
        }
    }
</script>


<template>
    <Editor
        api-key="q80snsb1dfgow5zr43okczr9tebsv5nbj258jjp1433nlpkb"
        :init="init"
        name="blog"
        v-model="value"

    />
</template>

<style scoped>
</style>

