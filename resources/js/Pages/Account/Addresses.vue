<script setup>
    import AddressCard from '@/Pages/Account/Address/AddressCard.vue'
    import addAddress from '@/Pages/Account/Address/addAddress.vue'
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import AuthenticationCard from '@/Components/AuthenticationCard.vue';
    import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
    import Checkbox from '@/Components/Checkbox.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';

    // defineProps({
    //     canResetPassword: Boolean,
    //     status: String,
    // });

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
    <div class="tab-pane fade" id="addresses" role="tabpanel" aria-labelledby="addresses-tab">

        <!-- Modal -->
        <addAddress />
        <div class="modal fade" id="delete-address-modal" tabindex="-1" role="dialog" aria-labelledby="delete-address" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete-address">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0 text-black">Are you sure you want to delete this xxxxx?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn d-flex w-50 text-center justify-content-center btn-outline-primary" data-dismiss="modal">CANCEL
                        </button><button type="button" class="btn d-flex w-50 text-center justify-content-center btn-primary">DELETE</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-around">

            <h4 class="font-weight-bold mt-0 mb-4">{{$t('account.addresses.manage_addresses')}}</h4>

            <h4>
                <a class="btn theme-btn-1"  data-toggle="modal" data-target="#add-address-modal"  href="#"><i class="icofont-ui-add"></i> {{$t('account.addresses.add_button')}}</a>
            </h4>
        </div>
        <div  class="row pb-2">
            <AddressCard v-for="(model,index) in $page.props.addresses" :key="model.id"  :model="model" />
        </div>
<!--        <div class="row">-->
<!--            <div class="col-md-6">-->
<!--                <div class="bg-white card addresses-item mb-4 border border-primary shadow">-->
<!--                    <div class="gold-members p-4">-->
<!--                        <div class="media">-->
<!--                            <div class="mr-3"><i class="icofont-ui-home icofont-3x"></i></div>-->
<!--                            <div class="media-body">-->
<!--                                <h6 class="mb-1 text-secondary">Home</h6>-->
<!--                                <p class="text-black">Osahan House, Jawaddi Kalan, Ludhiana, Punjab 141002, India-->
<!--                                </p>-->
<!--                                <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#add-address-modal"  href="#"><i class="icofont-ui-edit"></i> EDIT</a> <a class="text-danger" data-toggle="modal" data-target="#delete-address-modal" href="#"><i class="icofont-ui-delete"></i> DELETE</a></p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-6">-->
<!--                <div class="bg-white card addresses-item mb-4 shadow-sm">-->
<!--                    <div class="gold-members p-4">-->
<!--                        <div class="media">-->
<!--                            <div class="mr-3"><i class="icofont-briefcase icofont-3x"></i></div>-->
<!--                            <div class="media-body">-->
<!--                                <h6 class="mb-1">Work</h6>-->
<!--                                <p>NCC, Model Town Rd, Pritm Nagar, Model Town, Ludhiana, Punjab 141002, India-->
<!--                                </p>-->
<!--                                <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" data-target="#add-address-modal" href="#"><i class="icofont-ui-edit"></i> EDIT</a> <a class="text-danger" data-toggle="modal" data-target="#delete-address-modal" href="#"><i class="icofont-ui-delete"></i> DELETE</a></p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</template>
