<script>
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    // import Datatable from '@/Pages/Admin/DataTable/Datatable.vue';
    import {Inertia} from "@inertiajs/inertia";
    // import editUser from '@/Pages/Admin/Clients/editUser.vue';
    // import showRole from '@/Pages/Admin/Roles/showRole.vue';
    // import deleteBlog from '@/Pages/Admin/Blogs/deleteBlog.vue';
    import Main from '@/Pages/Admin/Messages/main.vue';
    import Left from '@/Pages/Admin/Messages/left.vue';

    export default {
        components :{
            AdminLayout,
            Main,
            Left
            // Datatable,
            // addUser,
            // editUser,
            // deleteBlog
        } ,
        props : ['datatableUrl','datatableColumns','datatableHeaders'],
        methods :{
            ShowImagePage : function (data){

                Inertia.visit(this.route('admin.media.index',{
                    model : data.model,
                    model_id : data.model_id
                }))

            },
            ShowEditModel : function (data){
                this.modelToUpdate = data;
            },
            ShowShowModel : function (data){
                this.modelToShow = data;
            },
            ShowDeleteModel : function (data){
                console.log("check");
                this.modelToDelete = data;
            },
            ShowAddModel : function (){
                this.modelToAdd = true;
            },
            ShowEditPage : function (data){
                Inertia.visit(this.route(data.modal_ids.edit,{
                    id : data.id
                }))
            },
            ShowShowPage : function (data){
                Inertia.visit(this.route(data.modal_ids.show,{
                    id : data.id
                }))
            },
            ShowAddPage : function (data){
                Inertia.visit(this.route(data.modal_ids.add))
            },

            resetModel : function (){
                this.modelToUpdate = null;
                this.modelToShow = null;
                this.modelToDelete = null;
                this.modelToAdd = null;
            }
        },
        data(){
            return {
                modelToUpdate : null,
                modelToShow : null,
                modelToDelete : null,
                modelToAdd : null
            }
        },
        computed : {
            model : function (){
                return this.modelToUpdate!==null
            }
        }
    }


</script>

<template>
    <AdminLayout  :title="'Messages'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Messages
            </h2>
        </template>
        <div>
            <div class="container-fluid px-0">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="border-bottom">
                                <div class="card-header">
                                    <i class="feather-message-square mr-1"></i>
                                    Latest Messaging
                                </div>
                                <div class="card-body osahan-chat p-0">
                                    <div class="row m-0">
                                        <Left/>
                                        <Main/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
<!--        <Datatable @ShowImagePage="ShowImagePage" @ShowShowPage="ShowShowPage" @ShowEditPage="ShowEditPage"  @ShowAddPage="ShowAddPage"  @ShowAddModel="ShowAddModel" @ShowDeleteModel="ShowDeleteModel" @ShowShowModel="ShowShowModel"  @ShowEditModel="ShowEditModel" :title="'Blogs table'" :datatableHeaders="datatableHeaders" :datatableColumns="datatableColumns" :datatableUrl="datatableUrl" />-->
<!--        <editUser @ResetModel="resetModel" v-if="model" :model="modelToUpdate"></editUser>-->
        <!--        <showRole @ResetModel="resetModel" v-if="modelToShow!=null" :model="modelToShow"></showRole>-->
<!--        <deleteBlog @ResetModel="resetModel" v-if="modelToDelete!=null" :model="modelToDelete"></deleteBlog>-->
<!--        <addUser @ResetModel="resetModel" v-if="modelToAdd!=null"></addUser>-->

    </AdminLayout>
</template>
