
<template>
    <Update @resetModel="resetModel"  :id="model.modal_ids.edit" title="Edit User">
        <div  class="modal-body mx-3 bg" >
            <form @submit.prevent="submit">
                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Name</label>
                        <input v-model="form.name" type="text" class="form-control" placeholder="User Name">
                        <div v-show="form.errors.name">
                            <p class="text-sm " style="color: red">
                                {{ form.errors.name }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input v-model="form.email" type="email" id="inputEmail" class="form-control" placeholder="email">
                        <div v-show="form.errors.email">
                            <p class="text-sm text-red-600" style="color: red">
                                {{ form.errors.email }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input v-model="form.password" type="password"  class="form-control" placeholder="********">
                        <div v-show="form.errors.password">
                            <p class="text-sm text-red-600" style="color: red">
                                {{ form.errors.password }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password confirmation</label>
                        <input v-model="form.password_confirmation" type="password"  class="form-control" placeholder="********">
                        <div v-show="form.errors.password_confirmation">
                            <p class="text-sm text-red-600" style="color: red">
                                {{ form.errors.password_confirmation }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Roles</label>
                        <multiselect
                                    v-model="form.roles"
                                    :options="options"
                                    label="name"
                                    track-by="name"
                                    :multiple="true"
                                    placeholder="Select Roles"
                        ></multiselect>
                        <div v-show="form.errors.roles">
                            <p class="text-sm " style="color: red">
                                {{ form.errors.roles }}
                            </p>
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

            let modal = $("#"+this.model.modal_ids.edit);


            modal.modal('show');


            modal.on('hidden.bs.modal',function (){
                app.$emit('ResetModel');
            })
        },
        data(){
            return {
                form : useForm({
                    name: this.model.name,
                    email : this.model.email,
                    password: '',
                    password_confirmation: '',
                    roles : this.model.roles.map(function (item){return {name : item.name,id : item.id};})
                }),
                selected : null,
                options: this.$page.props.roles.map(function (item){return {name : item.name,id : item.id};})
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
                    roles : data.roles.map(item => item.id),
                    email : data.email,
                    password : data.password,
                    password_confirmation: data.password_confirmation
                })).patch(route('admin.user.update',{
                    id : this.model.id
                }), {
                    onFinish: () => {
                        this.form.reset('password', 'password_confirmation')
                    },
                    onSuccess : () => {
                        $("#"+this.model.modal_ids.edit).modal('hide');
                        $('#dataTable').DataTable().ajax.reload()
                        this.$emit('ResetModel');
                    }
                });
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
