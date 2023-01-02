<script>
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    import Datatable from '@/Pages/Admin/DataTable/Datatable.vue';
    import {Inertia} from "@inertiajs/inertia";
    // import editUser from '@/Pages/Admin/Clients/editUser.vue';
    // import showRole from '@/Pages/Admin/Roles/showRole.vue';
    import deleteBlog from '@/Pages/Admin/Blogs/deleteBlog.vue';
    // import addUser from '@/Pages/Admin/Clients/addUser.vue';

    export default {
        components :{
            AdminLayout,
            Datatable,
            // addUser,
            // editUser,
            deleteBlog
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
    <AdminLayout  :title="'Blogs'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Blogs
            </h2>
        </template>

        <Datatable @ShowImagePage="ShowImagePage" @ShowShowPage="ShowShowPage" @ShowEditPage="ShowEditPage"  @ShowAddPage="ShowAddPage"  @ShowAddModel="ShowAddModel" @ShowDeleteModel="ShowDeleteModel" @ShowShowModel="ShowShowModel"  @ShowEditModel="ShowEditModel" :title="'Blogs table'" :datatableHeaders="datatableHeaders" :datatableColumns="datatableColumns" :datatableUrl="datatableUrl" />
<!--        <editUser @ResetModel="resetModel" v-if="model" :model="modelToUpdate"></editUser>-->
        <!--        <showRole @ResetModel="resetModel" v-if="modelToShow!=null" :model="modelToShow"></showRole>-->
        <deleteBlog @ResetModel="resetModel" v-if="modelToDelete!=null" :model="modelToDelete"></deleteBlog>
<!--        <addUser @ResetModel="resetModel" v-if="modelToAdd!=null"></addUser>-->

    </AdminLayout>
</template>
