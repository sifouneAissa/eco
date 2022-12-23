<script>

    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    import Datatable from '@/Pages/Admin/DataTable/Datatable.vue';
    import editRole from '@/Pages/Admin/Roles/editRole.vue';
    import showRole from '@/Pages/Admin/Roles/showRole.vue';

    export default {
        components :{
            AdminLayout,
            Datatable,
            editRole,
            showRole
        } ,
        props : ['datatableUrl','datatableColumns','datatableHeaders'],
        methods :{
            ShowEditModel : function (data){
                this.modelToUpdate = data;
            },
            ShowShowModel : function (data){
                this.modelToShow = data;
            },
            resetModel : function (){
                this.modelToUpdate = null;
                this.modelToShow = null;
            }
        },
        data(){
            return {
                modelToUpdate : null,
                modelToShow : null,
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
    <AdminLayout  title="Roles">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Roles
            </h2>
        </template>

        <Datatable @ShowShowModel="ShowShowModel"  @ShowEditModel="ShowEditModel" :title="'Roles table'" :datatableHeaders="datatableHeaders" :datatableColumns="datatableColumns" :datatableUrl="datatableUrl" />
        <editRole @ResetModel="resetModel" v-if="model" :model="modelToUpdate"></editRole>
        <showRole @ResetModel="resetModel" v-if="modelToShow!=null" :model="modelToShow"></showRole>

    </AdminLayout>
</template>

