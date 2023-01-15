<!--<script setup>-->


<!--    defineProps({-->
<!--        model : Object,-->
<!--    });-->

<!--   -->
<!--</script>-->
<template>

    <div  class="ltn__modal-area">
    <div class="modal fade" :id="'update-address-modal-'+model.id" tabindex="-1" role="dialog" aria-labelledby="add-address" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-2" id="add-address">{{$t("account.addresses.edit_card.title")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="btn-black" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="submit(model)">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="address_line_1">{{$t("account.addresses.add_card.address1")}}</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.address_line_1" class="form-control" id="address_line_1" :placeholder="$t('account.addresses.add_card.address1')">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="icofont-ui-pointer"></i></button>
                                    </div>

                                </div>
                                <div v-show="add_form.errors.address_line_1">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.address_line_1 }}
                                    </p>
                                </div>

                            </div>
                            <div class="form-group col-md-6">
                                <label for="address_line_1">{{$t("account.addresses.add_card.address2")}}</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.address_line_2" class="form-control" id="address_line_2" :placeholder="$t('account.addresses.add_card.address2')">
                                </div>

                                <div v-show="add_form.errors.address_line_2">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.address_line_2 }}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="city">{{$t("account.addresses.add_card.city")}}</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.city" class="form-control" id="city" :placeholder="$t('account.addresses.add_card.city')">
                                </div>

                                <div v-show="add_form.errors.city">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.city }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Country">{{$t("account.addresses.add_card.country")}}</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.country" class="form-control" id="Country" :placeholder="$t('account.addresses.add_card.country')">
                                </div>

                                <div v-show="add_form.errors.country">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.country }}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="mobile">{{$t("account.addresses.add_card.mobile")}}</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.mobile" class="form-control" id="mobile" :placeholder="$t('account.addresses.add_card.mobile')">
                                </div>

                                <div v-show="add_form.errors.mobile">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.mobile }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="telephone">{{$t("account.addresses.add_card.telephone")}}</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.telephone" class="form-control" id="telephone" :placeholder="$t('account.addresses.add_card.telephone')">
                                </div>

                                <div v-show="add_form.errors.telephone">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.telephone }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="postal_code">{{$t("account.addresses.add_card.postal_code")}}</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.postal_code" class="form-control" id="postal_code" :placeholder="$t('account.addresses.add_card.postal_code')">
                                </div>

                                <div v-show="add_form.errors.postal_code">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.postal_code }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn d-flex w-50 text-center justify-content-center btn-outline-dark" data-dismiss="modal">{{$t("account.addresses.add_card.cancel")}}
                            </button><button  type="submit" class="btn d-flex w-50 text-center justify-content-center btn-black">{{$t("account.addresses.add_card.save")}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>

    import {useForm} from "@inertiajs/inertia-vue3";

    export default {
        data (){
            return {
                add_form : useForm({
                    address_line_1: this.model.address_line_1,
                    address_line_2: this.model.address_line_2,
                    city : this.model.city,
                    postal_code : this.model.postal_code,
                    country : this.model.country,
                    mobile : this.model.mobile,
                    telephone : this.model.telephone
                }),
                submit : function (model) {

                    this.add_form.transform(data => ({
                        ...data,
                    })).patch(route('address.update',{address : model.id}), {
                        // onFinish: () => add_form.reset(),
                        onSuccess : function () {
                            $('#update-address-modal-'+ model.id).modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            // add_form.reset('address_line_1','address_line_2','mobile');
                        }
                    });
                },
            }
        },
        props : {
            model : Object
        }
    }
</script>
