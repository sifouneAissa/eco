
<template>
    <Update @resetModel="resetModel"  :id="model.modal_ids.edit" title="Edit Product">
        <div  class="modal-body mx-3 bg" >
            <form @submit.prevent="submit">
                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Name</label>
                        <input v-model="form.name" type="text" class="form-control" placeholder="Product Name">
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
                        <label>Description</label>
                        <textarea class="form-control" v-model="form.desc" placeholder="Desc"></textarea>
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
                    <div class="row ">
                        <div class="col-12 form-group">
                            <label>Inventory</label>
                            <div class=" float-right custom-control custom-radio custom-control-inline">
                                <input v-model="form.start_over" type="checkbox" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label " for="customRadioInline1">Start over</label>
                            </div>
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
                </div>


                <div class="modal-footer d-flex  ">
                    <button type="button" class="btn btn-outline-warning" @click="resetModel" data-dismiss="modal">{{$t("account.addresses.add_card.cancel")}}
                    </button><button  type="submit" class="btn btn-warning">{{$t("account.addresses.add_card.save")}}</button>
                </div>
            </form>

        </div>
    </Update>
</template>
<script>
    import Update from '@/Pages/Admin/DataTable/Modals/Update.vue';
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import Multiselect from 'vue-multiselect'

    export default  {
        components : {
            Update,
            Multiselect
        },
        props : {
            model : Object
        },
        mounted() {
            let app = this;
            let modal = $('#'+this.model.modal_ids.edit);

            modal.on('hidden.bs.modal',function (){
                app.$emit('ResetModel');
            })
            modal.modal('show');
        },
        data(){
            return {
                form : useForm({
                    name: this.model.name,
                    desc: this.model.desc,
                    price: this.model.price,
                    start_over : !this.model.isA.isA,
                    inventory : {name : this.model.inventory.quantity,id : this.model.inventory.id},
                    category:  {name : this.model.category.name,id : this.model.category.id}
                }),
                selected : null,
                options1: this.$page.props.categories.map(function (item){return {name : item.name,id : item.id};}),
                options2: this.$page.props.inventories.map(function (item){return {name : item.quantity,id : item.id};})
            }

        },
        methods : {
            resetModel : function (){
                this.$emit('ResetModel');
            },
            submit : function () {
                // this.form
                this.form.transform((data) => ({
                    name : data.name,
                    product_category_id : data.category.id,
                    product_inventory_id : data.inventory.id,
                    desc : data.desc,
                    price : data.price,
                    start_over : data.start_over
                })).patch(route('admin.product.update',{
                    id : this.model.id
                }), {
                    onFinish: () => {
                    },
                    onSuccess : () => {
                        $('#'+this.model.modal_ids.edit).modal('hide');
                        $('#dataTable').DataTable().ajax.reload()
                        this.$emit('ResetModel');
                    }
                });
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
