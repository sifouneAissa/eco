<script>
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    import Datatable from '@/Pages/Admin/DataTable/Datatable.vue';
    import {Inertia} from "@inertiajs/inertia";

    import addQuestion from '@/Pages/Admin/Questions/addQuestion.vue';
    import editQuestion from '@/Pages/Admin/Questions/editQuestion.vue';
    import deleteQuestion from '@/Pages/Admin/Questions/deleteQuestion.vue';

    export default {
        components :{
            AdminLayout,
            Datatable,
            addQuestion,
            editQuestion,
            deleteQuestion
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
    <AdminLayout  :title="'Questions'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Questions
            </h2>
        </template>

        <Datatable @ShowShowPage="ShowShowPage" @ShowEditPage="ShowEditPage"  @ShowAddPage="ShowAddPage"  @ShowAddModel="ShowAddModel" @ShowDeleteModel="ShowDeleteModel" @ShowShowModel="ShowShowModel"  @ShowEditModel="ShowEditModel" :title="'Questions table'" :datatableHeaders="datatableHeaders" :datatableColumns="datatableColumns" :datatableUrl="datatableUrl" />
        <editQuestion @ResetModel="resetModel" v-if="model" :model="modelToUpdate"></editQuestion>
        <!--        <showRole @ResetModel="resetModel" v-if="modelToShow!=null" :model="modelToShow"></showRole>-->
        <deleteQuestion @ResetModel="resetModel" v-if="modelToDelete!=null" :model="modelToDelete"></deleteQuestion>
        <addQuestion @ResetModel="resetModel" v-if="modelToAdd!=null"></addQuestion>

    </AdminLayout>
</template>
