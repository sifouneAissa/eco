<template>

    <Update @resetModel="resetModel"  :id="'edit-media'" title="Edit Media">
        <div  class="modal-body mx-3 bg" >
            <form @submit.prevent="submit">
                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <div class="col-12 mb-4 pb-2">
                            <div
                                class="list-card bg-transparent h-100 rounded overflow-hidden position-relative shadow-sm">
                                <div class="list-card-image">
                                    <center>
                                        <a target="_blank" :href="media.full_url">
                                            <img style="{
                                    width: 100%;
                                    height: 10vw;
                                    }" :src="media.full_url" class="item-img">
                                        </a>
                                    </center>
                                </div>

                            </div>
                    </div>
                </div>
                    <div class="form-group">
                        <label>Upload the new Image</label>
                        <dropzone :doRefresh="false" @fileUploaded="fileUploaded" :model="$page.props.model" :model_id="$page.props.model_id" :url="route('admin.media.update',{
                            id : media.id
                        })" >
                        </dropzone>
                    </div>
                <div class="modal-footer d-flex  ">
                    <button type="button" class="btn btn-outline-warning" @click="resetModel" data-dismiss="modal">{{$t("account.addresses.add_card.cancel")}}
                    </button>
                </div>
               </div>
            </form>

        </div>
    </Update>

</template>

<script>
    import Update from '@/Pages/Admin/DataTable/Modals/Update.vue';

    import dropzone from "@/Pages/Admin/Media/dropzone.vue";
    import {Inertia} from "@inertiajs/inertia";

    export default {
        name: "editMedia",
        components : {
            Update,dropzone
        },
        mounted() {
            let app = this;

            let modal = $("#edit-media");


            modal.modal('show');


            modal.on('hidden.bs.modal',function (){
                app.$emit('ResetModel');
            })

        },
        props : ['media'],
        methods : {
            fileUploaded: function (){
                let modal = $("#edit-media");
                modal.modal('hide');

                Inertia.visit(this.route('admin.media.index',{
                    model: this.$page.props.model,
                    model_id: this.$page.props.model_id
                }));

                this.$emit('ResetModel');
            },
            resetModel: function (){
                this.$emit('ResetModel');
            }

        }
    }
</script>

<style scoped>

</style>
