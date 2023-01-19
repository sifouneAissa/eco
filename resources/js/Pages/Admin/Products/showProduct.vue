
<template>
    <Show :lg="true"  @resetModel="resetModel"  :id="model.modal_ids.edit" title="Show Product">
        <div class="modal-body mx-3 bg" >
                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Name</label>
                        <input disabled v-model="form.name" type="text" class="form-control" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input disabled v-model="form.price" type="number" id="inputEmail" class="form-control" placeholder="0000.0">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <div class="card-body" v-html="model.desc">
                        </div>
<!--                        <textarea disabled class="form-control" v-model="form.desc" placeholder="Desc"></textarea>-->
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
                            :disabled="true"
                        ></multiselect>
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
                            :disabled="true"
                        ></multiselect>
                    </div>
                </div>

                <div class="modal-footer d-flex  ">
                    <button type="button" class="btn btn-outline-success" @click="resetModel" data-dismiss="modal">Close
                    </button>
                </div>
        </div>
    </Show>
</template>
<script>
    import Show from '@/Pages/Admin/DataTable/Modals/Show.vue';
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import Multiselect from 'vue-multiselect'

    export default  {
        components : {
            Show,
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
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
