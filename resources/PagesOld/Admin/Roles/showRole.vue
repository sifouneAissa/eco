
<template>
    <Show @resetModel="resetModel"  :id="model.modal_ids.show" title="Show Role">
        <div  class="modal-body mx-3 bg" >
<!--            <form @submit.prevent="submit">-->
                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Name</label>
                        <input disabled="true" v-model="form.name" type="text" class="form-control" placeholder="Role Name">
                        <div v-show="form.errors.name">
                            <p class="text-sm " style="color: red">
                                {{ form.errors.name }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Permissions</label>
                        <multiselect
                                    :disabled="true"
                                    v-model="form.permissions"
                                    :options="options"
                                    label="name"
                                    track-by="name"
                                    :multiple="true"
                                    placeholder="Select Permissions"
                        ></multiselect>
                        <div v-show="form.errors.permissions">
                            <p class="text-sm " style="color: red">
                                {{ form.errors.permissions }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex  ">
                    <button type="button" class="btn btn-outline-success" @click="resetModel" data-dismiss="modal">Close
                    </button>
                </div>
<!--            </form>-->

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
            model : {
                type : Object,
                default :{
                    name : 'Waiting',
                }
            }
        },
        mounted() {
            let app = this;
            let modal = $('#'+this.model.modal_ids.show);

            modal.on('hidden.bs.modal',function (){
                app.$emit('ResetModel');
            })

            modal.modal('show');
        },
        data(){
            return {
                form : useForm({
                    name: this.model.name,
                    permissions : this.model.permissions.map(function (item){return {name : item.name,id : item.id};})
                }),
                selected : null,
                options: this.$page.props.permissions.map(function (item){return {name : item.name,id : item.id};})
            }

        },
        methods : {
            resetModel : function (){
                this.$emit('ResetModel');
            }
        }
    }
</script>

<style src="../../../../node_modules/vue-multiselect/dist/vue-multiselect.css"></style>
