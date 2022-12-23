<script>
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    import Datatable from '@/Pages/Admin/DataTable/Datatable.vue';
    import editRole from '@/Pages/Admin/Roles/editRole.vue';
    import showRole from '@/Pages/Admin/Roles/showRole.vue';
    import deleteRole from '@/Pages/Admin/Roles/deleteRole.vue';
    import addUser from '@/Pages/Admin/Users/addUser.vue';

    export default {
        components :{
            AdminLayout,
            Datatable,
            addUser
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
    <AdminLayout  title="Users">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>

        <Datatable  @ShowAddModel="ShowAddModel" @ShowDeleteModel="ShowDeleteModel" @ShowShowModel="ShowShowModel"  @ShowEditModel="ShowEditModel" :title="'Users table'" :datatableHeaders="datatableHeaders" :datatableColumns="datatableColumns" :datatableUrl="datatableUrl" />
<!--        <editRole @ResetModel="resetModel" v-if="model" :model="modelToUpdate"></editRole>-->
<!--        <showRole @ResetModel="resetModel" v-if="modelToShow!=null" :model="modelToShow"></showRole>-->
<!--        <deleteRole @ResetModel="resetModel" v-if="modelToDelete!=null" :model="modelToDelete"></deleteRole>-->
        <addUser @ResetModel="resetModel" v-if="modelToAdd!=null"></addUser>

    </AdminLayout>
</template>

