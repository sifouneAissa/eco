
<template>
    <Add @resetModel="resetModel"  :id="'add-user'" title="Add User">
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
                        <label>Permissions</label>
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
            let modal = $('#add-user');
            modal.on('hidden.bs.modal',function (){
                app.$emit('ResetModel');
            })
            modal.modal('show');
        },
        data(){
            return {
                form : useForm({
                    name: '',
                    email : '',
                    password: '',
                    password_confirmation: '',
                    roles : []
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
                })).post(route('admin.user.store',{}), {
                    onFinish: () => {
                        this.form.reset('password', 'password_confirmation')
                    },
                    onSuccess : () => {
                        $('#add-user').modal('hide');
                        $('#dataTable').DataTable().ajax.reload()
                        this.$emit('ResetModel');
                    }
                });
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
