<script setup>

    import {useForm} from "@inertiajs/inertia-vue3";

    const add_form = useForm({
        address_line_1: '',
        address_line_2: '',
        city : '',
        postal_code : '',
        country : '',
        mobile : '',
        telephone : ''
    });

    const submit = () => {

        add_form.transform(data => ({
            ...data,
        })).post(route('address.store'), {
            // onFinish: () => add_form.reset(),
            onSuccess : function () {
                $('#add-address-modal').modal('hide');
                add_form.reset('address_line_1','address_line_2','mobile');
            }
        });
    };
</script>
<template>
    <div class="modal fade" id="add-address-modal" tabindex="-1" role="dialog" aria-labelledby="add-address" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-address">Add Delivery Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="submit">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="address_line_1">Address line 1</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.address_line_1" class="form-control" id="address_line_1" placeholder="Delivery Area">
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
                            <div class="form-group col-md-12">
                                <label for="address_line_1">Address line 2</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.address_line_2" class="form-control" id="address_line_2" placeholder="Delivery Area">
                                </div>

                                <div v-show="add_form.errors.address_line_2">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.address_line_2 }}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="city">City</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.city" class="form-control" id="city" placeholder="Delivery Area">
                                </div>

                                <div v-show="add_form.errors.city">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.city }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="Country">Country</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.country" class="form-control" id="Country" placeholder="Delivery Area">
                                </div>

                                <div v-show="add_form.errors.country">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.country }}
                                    </p>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="mobile">Mobile</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.mobile" class="form-control" id="mobile" placeholder="Delivery Area">
                                </div>

                                <div v-show="add_form.errors.mobile">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.mobile }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="telephone">Telephone</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.telephone" class="form-control" id="telephone" placeholder="Delivery Area">
                                </div>

                                <div v-show="add_form.errors.telephone">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.telephone }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="postal_code">Postal Code</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.postal_code" class="form-control" id="postal_code" placeholder="Delivery Area">
                                </div>

                                <div v-show="add_form.errors.postal_code">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.postal_code }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn d-flex w-50 text-center justify-content-center btn-outline-primary" data-dismiss="modal">CANCEL
                            </button><button  type="submit" class="btn d-flex w-50 text-center justify-content-center btn-primary">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
