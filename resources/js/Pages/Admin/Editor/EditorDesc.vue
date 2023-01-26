<script >
    import Editor from '@tinymce/tinymce-vue'
    export default {
        props : ['initValue','id'],
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
                    plugins: 'lists link  table code help wordcount  code fullscreen',
                    toolbar: 'undo redo | link | fullscreen | formatselect | ' +
                        'bold italic backcolor | alignleft aligncenter ' +
                        'alignright alignjustify | bullist numlist outdent indent | ' +
                        'removeformat | help',
                    // image_title: false,
                    /* enable automatic uploads of images represented by blob or data URIs*/
                    // automatic_uploads: true,
                    // paste_data_images: true,
                    // browser_spellcheck: true,
                    selector: 'textarea',
                    setup: function (editor) {
                        editor.on('init', function (event) {

                            $(editor.getBody().parentNode).bind('drag drop', function (e) {
                                /* your magic code here */
                            });

                        });
                        editor.on("input", function (e) {
                            // validateInput(this.id);

                            // $emit('Writing')
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
        :id="id ? id : 'editorDesc'"
    />
</template>

<style scoped>
</style>

