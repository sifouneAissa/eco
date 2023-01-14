<script>
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    import Datatable from '@/Pages/Admin/DataTable/Datatable.vue';
    import editUser from '@/Pages/Admin/Users/editUser.vue';
    import showRole from '@/Pages/Admin/Roles/showRole.vue';
    import deleteUser from '@/Pages/Admin/Users/deleteUser.vue';
    import addUser from '@/Pages/Admin/Users/addUser.vue';

    export default {
        components :{
            AdminLayout,
            Datatable,
            addUser,
            editUser,
            deleteUser
        } ,
        props : ['datatableUrl','datatableColumns','datatableHeaders'],
        methods :{
            ShowEditModel : function (data){
                this.modelToUpdate = data;
            },
            ShowShowModel : function (data){
                this.modelToShow = data;
            },
            ShowDeleteModel : function (data){
                this.modelToDelete = data;
            },
            ShowAddModel : function (){
                this.modelToAdd = true;
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
    <AdminLayout  :title="'Users'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>

        <Datatable  @ShowAddModel="ShowAddModel" @ShowDeleteModel="ShowDeleteModel" @ShowShowModel="ShowShowModel"  @ShowEditModel="ShowEditModel" :title="'Users table'" :datatableHeaders="datatableHeaders" :datatableColumns="datatableColumns" :datatableUrl="datatableUrl" />
        <editUser @ResetModel="resetModel" v-if="model" :model="modelToUpdate"></editUser>
<!--        <showRole @ResetModel="resetModel" v-if="modelToShow!=null" :model="modelToShow"></showRole>-->
        <deleteUser @ResetModel="resetModel" v-if="modelToDelete!=null" :model="modelToDelete"></deleteUser>
        <addUser @ResetModel="resetModel" v-if="modelToAdd!=null"></addUser>

    </AdminLayout>
</template>

