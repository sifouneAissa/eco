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
                                            <img  :src="media.full_url" class="item-img imgWL">
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
    @media (min-width:320px)  { /* smartphones, iPhone, portrait 480x320 phones */
        .imgWL {
            width: 100%;
            height: 50vw;
        }
    }
    @media (min-width:481px)  { /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
        .imgWL {
            width: 100%;
            height: 50vw;
        }
    }
    @media (min-width:641px)  { /* portrait tablets, portrait iPad, landscape e-readers, landscape 800x480 or 854x480 phones */
        .imgWL {
            width: 100%;
            height: 40vw;
        }
    }
    @media (min-width:961px)  { /* tablet, landscape iPad, lo-res laptops ands desktops */
        .imgWL {
            width: 100%;
            height: 15vw;
        }
    }
    @media (min-width:1025px) { /* big landscape tablets, laptops, and desktops */
        .imgWL {
            width: 100%;
            height: 15vw;
        }
    }
    @media (min-width:1281px) { /* hi-res laptops and desktops */
        .imgWL {
            width: 100%;
            height: 15vw;
        }
    }
</style>
