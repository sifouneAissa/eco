<template>

    <AdminLayout :title="'Media'" :urls="urls">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Media
            </h2>
        </template>
        <!-- /row-->
        <div class="row">
            <div class="col-md-12">
                <div v-if="$can('add '+$page.props.modelData.provider+' media')" class="form-group">
                    <label>Add new images</label>
                    <dropzone :doRefresh="true" :model="$page.props.model" :model_id="$page.props.model_id" >
                    </dropzone>
                </div>
                <div v-if="medias.length" class="card bg-transparent rounded">
                    <div class="card-header ">
                        <center><h1>Medias of {{$page.props.modelData.name}}</h1></center>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <draggable
                                class="col-12 row"
                                v-model="medias"
                                group="people"
                                @start="drag=true"
                                @end="onEnd(medias.map((item) => item.id),$event)"
                                item-key="id">
                                <template class="col-md-3 col-sm-6 mb-4 pb-2" #item="{element}">
                                    <div class="col-md-3 col-sm-6 mb-4 pb-2">
                                        <div
                                            class="list-card bg-transparent h-100 rounded overflow-hidden position-relative shadow-sm">
                                            <div class="list-card-image">
                                                <!--                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>-->
                                                <div class="favourite-heart text-danger position-absolute">
                                                    <a v-if="element.order===0" href="javascript:void(0)"
                                                       data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Default Image"
                                                    ><i class="feather-award text-success " ></i> </a>
                                                    <a data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Edit" v-if="$can('edit '+$page.props.modelData.provider+' media')"
                                                       @click="this.mediaToUpdate=element"><i
                                                        class="feather-edit text-warning"></i></a>
                                                    <a data-bs-toggle="tooltip"
                                                       data-bs-placement="top"
                                                       title="Delete" v-if="$can('delete '+$page.props.modelData.provider+' media')"
                                                       @click="this.mediaToDelete=element"><i
                                                        class="feather-delete text-danger"></i></a>
                                               </div>
                                                <center>
                                                    <a target="_blank" :href="element.full_url">
                                                        <img :src="element.full_url" class="item-img imgWL">
                                                    </a>
                                                </center>
                                            </div>

                                        </div>

                                    </div>
                                </template>
                            </draggable>
                        </div>
                    </div>
                </div>
                <edit-media @ResetModel="resetModel" v-if="mediaToUpdate!=null" :media="mediaToUpdate"></edit-media>
                <delete-media @ResetModel="resetModel" v-if="mediaToDelete!=null" :model="mediaToDelete"></delete-media>

            </div>

        </div>
        <!-- /row-->


    </AdminLayout>
</template>


<script>
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    import editMedia from '@/Pages/Admin/Media/editMedia.vue';
    import deleteMedia from '@/Pages/Admin/Media/deleteMedia.vue';
    import dropzone from "@/Pages/Admin/Media/dropzone.vue";
    import draggable from 'vuedraggable'
    import {Inertia} from "@inertiajs/inertia";
    export default {
        components: {
            AdminLayout, dropzone,editMedia,deleteMedia,draggable
        },
        methods: {
            resetModel : function (){

                this.mediaToUpdate = null;
                this.mediaToDelete = null;
            },
            onEnd : function (list,event){
                let app = this;
                if(list.length>1)
                Inertia.post(this.route('admin.media.order'),{
                    ids : list,
                },{
                    onSuccess : (res) => {
                        app.medias = res.props.medias;
                    },
                    preserveScroll : true
                })
            }
        },
        mounted() {
        },
        data() {
            return {
                medias : this.$page.props.medias,
                mediaToUpdate : null,
                mediaToDelete : null,
                urls : this.$page.props.modelData.crumb
            }
        },
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
