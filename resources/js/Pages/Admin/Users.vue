<script>
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    import Datatable from '@/Pages/Admin/DataTable/Datatable.vue';
    import editRole from '@/Pages/Admin/Roles/editRole.vue';
    import showRole from '@/Pages/Admin/Roles/showRole.vue';
    import deleteRole from '@/Pages/Admin/Roles/deleteRole.vue';

    export default {
        components :{
            AdminLayout,
            Datatable
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
            resetModel : function (){
                this.modelToUpdate = null;
                this.modelToShow = null;
                this.modelToDelete = null
            }
        },
        data(){
            return {
                modelToUpdate : null,
                modelToShow : null,
                modelToDelete : null
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

        <Datatable @ShowDeleteModel="ShowDeleteModel" @ShowShowModel="ShowShowModel"  @ShowEditModel="ShowEditModel" :title="'Users table'" :datatableHeaders="datatableHeaders" :datatableColumns="datatableColumns" :datatableUrl="datatableUrl" />
<!--        <editRole @ResetModel="resetModel" v-if="model" :model="modelToUpdate"></editRole>-->
<!--        <showRole @ResetModel="resetModel" v-if="modelToShow!=null" :model="modelToShow"></showRole>-->
<!--        <deleteRole @ResetModel="resetModel" v-if="modelToDelete!=null" :model="modelToDelete"></deleteRole>-->

    </AdminLayout>
</template>

