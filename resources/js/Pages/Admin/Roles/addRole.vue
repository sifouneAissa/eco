
<template>
    <Add @resetModel="resetModel"  :id="'add-role'" title="Add Role">
        <div  class="modal-body mx-3 bg" >
            <form @submit.prevent="submit">
                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Name</label>
                        <input v-model="form.name" type="text" class="form-control" placeholder="Role Name">
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

    export default  {
        components : {
            Add,
            Multiselect
        },
        props : {
        },
        mounted() {
            let app = this;
            let modal = $('#add-role');
            modal.on('hidden.bs.modal',function (){
                app.$emit('ResetModel');
            })
            modal.modal('show');
        },
        data(){
            return {
                form : useForm({
                    name: '',
                    permissions : []
                }),
                selected : null,
                options: this.$page.props.permissions.map(function (item){return {name : item.name,id : item.id};})
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
                    permissions : data.permissions.map(item => item.id)
                })).post(route('admin.role.store',{}), {
                    onFinish: () => {
                    },
                    onSuccess : () => {

                        $('#add-role').modal('hide');
                        $('#dataTable').DataTable().ajax.reload()
                        this.$emit('ResetModel');
                    }
                });
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
