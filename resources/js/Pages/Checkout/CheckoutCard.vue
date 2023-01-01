<script>
    import chooseAddress from '@/Pages/Checkout/chooseAddress.vue'
    import choosePayment from '@/Pages/Checkout/choosePayment.vue'
    import ProductCarousel from '@/Pages/Listing/ProductCarousel.vue'
    import CartMenu from '@/Pages/Checkout/CartMenu.vue'
    import {useForm} from "@inertiajs/inertia-vue3";
    import { useToast } from "vue-toastification";

    export default {
        components: {
            chooseAddress,
            choosePayment,
            ProductCarousel,
            CartMenu
        },
        props : ['model'],
        data() {
            return {

                form: useForm({
                        address_id: null,
                        user_id: this.$page.props.auth,
                        provider: null,
                        paymentInfo: null,
                        email: null,
                        withProduct : null,
                    }
                )
            }
        },
        methods: {
            incrQP(by){
                this.model.quantity = this.model.quantity + by;
                if(this.model.quantity > this.$page.props.product.isA.remain) this.model.quantity = this.$page.props.product.isA.remain;

                if(!this.model.quantity) this.model.quantity = 1;
            },
            submit : function () {
                let app = this;
                let form = useForm({
                    product_id : this.model.id,
                    quantity: this.model.quantity
                });

                form.transform(data => ({
                    ...data,
                })).post(route('addProduct'), {
                    // onFinish: () => add_form.reset(),
                    onSuccess : function () {
                    }
                });
            },
            setSelectedAddress(model) {
                if (model.toCreate)
                    this.form.address_id = model;
                else
                    this.form.address_id = model.id;
            },
            SelectPaymentMethod(data) {

                const toast = useToast();

                this.form.provider = data.type;
                this.form.paymentInfo = data.data;
                this.form.email = data.data.email;

                this.form.withProduct = {
                    product_id : this.model.id,
                    quantity : this.model.quantity
                };
                this.form.post(route('order.store'), {
                    onSuccess: () => {
                        toast.success('Operation successful')
                    },
                    onError: (errors) => {
                        toast.error(errors.error);
                    }
                })
            },
            Pay() {
                if (!this.form.address_id)
                    window.location.href = window.location.href.split('#')[0] + "#address";
                else
                    window.location.href = window.location.href.split('#')[0] + "#payment";
            }
        }
    }
</script>
<template>
    <div>
        <section id="checkout-payment" class="offer-dedicated-body mt-4 mb-4 pt-2 pb-2">
            <div class="container">
                <div class="card  bg-light rounded">
                    <div class="card-header">
                        <div class="col-6 ">
                        <span v-if="$page.props.product.isA.remain" class="restaurant-detailed-action-btn float-right">
                          <span class="count-number row">
                            <div class="row h5">
                               <button @click="incrQP(- 1)" class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>
                               <input  class="count-number-input" type="text" :value="$page.props.product.quantity" readonly="">
                               <button @click="incrQP(+ 1)" class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>
                            </div>

                          </span>
                          </span>
                        </div>

                        <p class="col-6 h2">
                            Total : {{$page.props.currency_code}} {{$page.props.product.cprice * $page.props.product.quantity}}
                        </p>



                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <chooseAddress
                                    :card_class="'col-12'"
                                    @setSelectedAddress="setSelectedAddress" :models="$page.props.addresses"/>
                            </div>
                            <div class="col-6">
                                <choosePayment
                                    :smodel="model"
                                    :form="form" :disable="this.form.address_id===null"
                                    @SelectPaymentMethod="SelectPaymentMethod"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
