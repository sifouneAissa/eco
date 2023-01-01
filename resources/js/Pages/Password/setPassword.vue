<script >
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import {Inertia} from "@inertiajs/inertia"
     export default {
        mounted() {
                let modal = $('#set-password');
                let app = this;
                modal.on('hidden.bs.modal',function (){
                    app.skip()
                })
        },
         data() {
             return {
                 form: useForm({
                     name: this.$page.props.shopping_user.name,
                     email: this.$page.props.shopping_user.email,
                     password: '',
                     password_confirmation: '',
                     terms: false,
                     check_shopping : true,
                 })
             }
         },
         methods: {
             submit: function () {
                 this.form.post(this.route('register'), {
                     onFinish: () => this.form.reset('password', 'password_confirmation'),
                     onSuccess: () => window.location.reload()
                 })
             },
             skip : function (){
                 Inertia.post(this.route('skipsetpassword'));
             }
         }
     }
</script>
<template>

    <div class="modal fade" id="set-password" tabindex="-1" role="dialog" aria-labelledby="add-address" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-address">Set up your account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="submit">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="form-label-group">
                                    <input required v-model="form.name" type="text" id="inputName" class="form-control" :placeholder="$t('register.name')">
                                    <label for="inputName">{{$t('register.name')}}</label>
                                    <div v-show="form.errors.name">
                                        <p class="text-sm " style="color: red">
                                            {{ form.errors.name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-label-group">
                                    <input required v-model="form.email" type="email" id="inputEmail" class="form-control" :placeholder="$t('register.email')">
                                    <label for="inputEmail">{{$t('register.email')}}</label>
                                    <div v-show="form.errors.email">
                                        <p class="text-sm text-red-600" style="color: red">
                                            {{ form.errors.email }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-label-group">
                                    <input required v-model="form.password" type="password" id="inputPassword" class="form-control" :placeholder="$t('register.password')">
                                    <label for="inputPassword">{{$t('register.password')}}</label>
                                    <div v-show="form.errors.password">
                                        <p class="text-sm text-red-600" style="color: red">
                                            {{ form.errors.password }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-label-group">
                                    <input required v-model="form.password_confirmation" type="password" id="inputPasswordCofirmation" class="form-control" :placeholder="$t('register.password_confirmation')">
                                    <label for="inputPasswordCofirmation">{{$t('register.password_confirmation')}}</label>
                                    <div v-show="form.errors.password_confirmation">
                                        <p class="text-sm text-red-600">
                                            {{ form.errors.password_confirmation }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button @click="skip" type="button" class="btn d-flex w-50 text-center justify-content-center btn-outline-primary" data-dismiss="modal">Skip
                            </button><button  type="submit" class="btn d-flex w-50 text-center justify-content-center btn-primary">{{$t("account.addresses.add_card.save")}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
