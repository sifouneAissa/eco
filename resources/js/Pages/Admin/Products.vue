<script>
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    import Datatable from '@/Pages/Admin/DataTable/Datatable.vue';
    import editProduct from '@/Pages/Admin/Products/editProduct.vue';
    import deleteProduct from '@/Pages/Admin/Products/deleteProduct.vue';
    import addProduct from '@/Pages/Admin/Products/addProduct.vue';
    import showProduct from '@/Pages/Admin/Products/showProduct.vue';

    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import {Inertia} from "@inertiajs/inertia";

    export default {
        components :{
            AdminLayout,
            Datatable,
            editProduct,
            deleteProduct,
            addProduct,
            showProduct,
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
            ShowImagePage : function (data){

                Inertia.visit(this.route('admin.media.index',{
                    model : data.model,
                    model_id : data.model_id
                }))

            },
            ShowOrdersPage : function(model){
                Inertia.visit(model.route)
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
    <AdminLayout  :title="'Products'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>

        <Datatable @ShowOrdersPage="ShowOrdersPage" @ShowImagePage="ShowImagePage"  @ShowAddModel="ShowAddModel" @ShowDeleteModel="ShowDeleteModel" @ShowShowModel="ShowShowModel"  @ShowEditModel="ShowEditModel" :title="'Products table'" :datatableHeaders="datatableHeaders" :datatableColumns="datatableColumns" :datatableUrl="datatableUrl" />
        <editProduct @ResetModel="resetModel" v-if="model" :model="modelToUpdate"></editProduct>
        <showProduct @ResetModel="resetModel" v-if="modelToShow!=null" :model="modelToShow"></showProduct>
        <deleteProduct @ResetModel="resetModel" v-if="modelToDelete!=null" :model="modelToDelete"></deleteProduct>
        <addProduct @ResetModel="resetModel" v-if="modelToAdd!=null"></addProduct>

    </AdminLayout>
</template>

