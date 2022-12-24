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
                <div class="form-group">
                    <label>Add new images</label>
                    <dropzone :doRefresh="true" :model="$page.props.model" :model_id="$page.props.model_id" >
                    </dropzone>
                </div>
                <div v-if="$page.props.medias.length" class="card bg-transparent rounded">
                    <div class="card-header ">
                        <center><h1>Medias of {{$page.props.modelData.name}}</h1></center>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div v-for="img in $page.props.medias" :key="img.id" class="col-md-3 col-sm-6 mb-4 pb-2">
                                <div
                                    class="list-card bg-transparent h-100 rounded overflow-hidden position-relative shadow-sm">
                                    <div class="list-card-image">
                                        <!--                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>-->
                                        <div class="favourite-heart text-danger position-absolute">
                                            <a @click="this.mediaToUpdate=img"><i class="feather-edit text-warning"></i></a>
                                            <a @click="this.mediaToDelete=img"><i class="feather-delete text-danger"></i></a>
                                        </div>
                                        <center>
                                            <a target="_blank" :href="img.full_url">
                                                <img style="{
                                                    width: 100%;
                                                    height: 10vw;
                                                    }" :src="img.full_url" class="item-img">
                                            </a>
                                        </center>
                                    </div>

                                </div>
                            </div>
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

    export default {
        components: {
            AdminLayout, dropzone,editMedia,deleteMedia
        },
        methods: {
            resetModel : function (){
                this.mediaToUpdate = null;
                this.mediaToDelete = null;
            }
        },
        data() {
            return {
                mediaToUpdate : null,
                mediaToDelete : null,
                urls : [
                    {
                        name : 'Product',
                        route : this.route('admin.product.index')
                    },
                    {
                        name : 'Product Media of : '+this.$page.props.modelData.name,
                        route : '#'
                    }
                ]
            }
        },
    }
</script>
