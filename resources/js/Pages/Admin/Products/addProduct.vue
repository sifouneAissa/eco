
<template>
    <Add :lg="true" @resetModel="resetModel"  :id="'add-product'" title="Add Product">
        <div  class="modal-body mx-3 bg " >
            <form @submit.prevent="submit">
                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Name</label>
                        <input v-model="form.name" type="text" class="form-control" placeholder="Product Name">
                        <add-t :type="'input'" @write="write" :attr="'Name'" :keyV="'name'" :cvalues="form.langs"/>
                        <div v-show="form.errors.name">
                            <p class="text-sm " style="color: red">
                                {{ form.errors.name }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input v-model="form.price" type="number" id="inputEmail" class="form-control" placeholder="0000.0">
                        <div v-show="form.errors.price">
                            <p class="text-sm text-red-600" style="color: red">
                                {{ form.errors.price }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Old Price</label>
                        <input v-model="form.old_price" type="number" id="inputEmail" class="form-control" placeholder="0000.0">
                        <div v-show="form.errors.old_price">
                            <p class="text-sm text-red-600" style="color: red">
                                {{ form.errors.price }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
<!--                        <textarea class="form-control" v-model="form.desc" placeholder="Desc"></textarea>-->
                        <Editor @Writing="Writing"/>
                        <add-t :type="'editor'" @write="write" :attr="'Desc'" :keyV="'desc'" :cvalues="form.langs"/>
                        <div v-show="form.errors.desc">
                            <p class="text-sm text-red-600" style="color: red">
                                {{ form.errors.desc }}
                            </p>
                        </div>
                    </div>
                </div>


                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Category</label>
                        <multiselect
                            v-model="form.category"
                            :options="options1"
                            label="name"
                            track-by="name"
                            :multiple="false"
                            placeholder="Select Category"
                        ></multiselect>
                        <div v-show="form.errors.product_category_id">
                            <p class="text-sm " style="color: red">
                                {{ form.errors.product_category_id }}
                            </p>
                        </div>
                    </div>
                </div>


                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Inventory</label>
                        <multiselect
                                    v-model="form.inventory"
                                    :options="options2"
                                    label="name"
                                    track-by="name"
                                    :multiple="false"
                                    placeholder="Select Inventory"
                        ></multiselect>
                        <div v-show="form.errors.product_inventory_id">
                            <p class="text-sm " style="color: red">
                                {{ form.errors.product_inventory_id }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex  ">
                    <button type="button" class="btn btn-outline-primary" @click="resetModel" data-dismiss="modal">{{$t("account.addresses.add_card.cancel")}}
                    </button><button  type="submit" class="btn btn-primary">{{$t("account.addresses.add_card.save")}}</button>
                </div>
            </form>

        </div>
    </Add>
</template>
<script>
    import Add from '@/Pages/Admin/DataTable/Modals/Add.vue';
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import Multiselect from 'vue-multiselect'
    import Editor from '@/Pages/Admin/Editor/EditorDesc.vue';
    import AddT from '@/Pages/Admin/Translations/addTranslation.vue';

    export default  {
        components : {
            Add,
            Multiselect,
            Editor,AddT
        },
        props : {
        },
        mounted() {
            let app = this;
            let modal = $('#add-product');
            modal.on('hidden.bs.modal',function (){
                app.$emit('ResetModel');
            })
            modal.modal('show');
        },
        data(){
            return {
                form : useForm({
                    name: '',
                    desc: '',
                    price: '',
                    old_price: '',
                    inventory : null,
                    category: null,
                    langs : []
                }),
                selected : null,
                options1: this.$page.props.categories.map(function (item){return {name : item.name,id : item.id};}),
                options2: this.$page.props.inventories.map(function (item){return {name : item.quantity,id : item.id};})
            }

        },
        methods : {
            write(ditem){
                this.form.langs = ditem;
                console.log(this.form.langs);
            },
            resetModel : function (){
                this.$emit('ResetModel');
            },
            Writing : function(data){
                this.form.desc = data;
            },
            submit : function () {
                // this.form
                this.form.transform((data) => ({
                    name : data.name,
                    product_category_id : data.category.id,
                    product_inventory_id : data.inventory.id,
                    desc : data.desc,
                    price : data.price,
                    old_price : data.old_price,
                    langs : data.langs
                })).post(route('admin.product.store',{}), {
                    headers: {
                        'Content-Type' : 'application/octet-stream'
                    },
                    onFinish: () => {
                    },
                    onSuccess : () => {
                        $('#add-product').modal('hide');
                        $('#dataTable').DataTable().ajax.reload()
                        this.$emit('ResetModel');
                    }
                });
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
