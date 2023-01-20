<template>

    <!-- MODAL AREA START (Add To Cart Modal) -->
    <div   class="ltn__modal-area ltn__add-to-cart-modal-area">
        <div class="modal fade" id="add_to_cart_modal" tabindex="-1">
            <div v-if="$page.props.productTo" :key="$page.props.productTo.id"  class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">
                        <div class="ltn__quick-view-modal-inner">
                            <div class="modal-product-item">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-product-img">
                                            <img :src="$page.props.productTo.fimage" alt="#">
                                        </div>
                                        <div class="modal-product-info">
                                            <h5><Link :href="route('product.show',{id : $page.props.productTo.id})">{{$page.props.productTo.name}}</Link></h5>

                                            <div class="row">
                                                <span
                                                    v-if="form.processing"
                                                    class="spinner-grow spinner-grow-md"
                                                    role="status"
                                                    aria-hidden="true"
                                                ></span>
                                                <p  class="added-cart">
                                                    <i v-if="!form.processing" class="fa fa-check-circle"></i>
                                                    Successfully added to your Cart</p>
                                            </div>
                                            <div class="btn-wrapper">
                                                <a @click="go('cartitem.index')" href="javascript: void(0)" class="theme-btn-1 btn btn-effect-1">View
                                                    Cart</a>
                                                <a @click="go('checkout.show')" href="javascript: void(0)" class="theme-btn-2 btn btn-effect-2">Checkout</a>
                                            </div>
                                        </div>
                                        <!-- additional-info -->
                                        <div class="additional-info d-none">
                                            <p>We want to give you <b>10% discount</b> for your first order,
                                                <br> Use discount code at checkout</p>
                                            <div class="payment-method">
                                                <img src="img/icons/payment.png" alt="#">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AREA END -->

</template>
<script>

    import {useToast} from "vue-toastification";
    import {useForm,Link} from "@inertiajs/inertia-vue3";
    import {Inertia} from "@inertiajs/inertia";

    export default  {
        components : {
            Link
        },
        data () {
            return {
                form : useForm({
                }),
                product : this.$page.props.productTo
            }
        },
        mounted() {
            let app = this;
            let add_to_cart_modal = $("#add_to_cart_modal");

            // add_to_cart_modal.on("hidden.bs.modal", function () {
            //     app.$page.props.product=null;
            // });
            //
            //
            add_to_cart_modal.on("shown.bs.modal", function (e) {
                console.log("check");
                app.submit(app.$page.props.productTo);
            });
        },
        methods: {
            incrQP(item, by) {
                const toast = useToast();
                // let q = item.quantity;
                let product = item;
                product.quantity = product.quantity + by;

                if (item.quantity > product.isA.remain) {
                    item.quantity = product.isA.remain;
                    toast.warning(this.$t("listing.limited")  + product.name);
                }

                if (!item.quantity) item.quantity = 1;

                // if (q !== item.quantity) this.submit(item, by);
            },
            submit: function (model) {
                let app = this;
                this.form
                    .transform((data) => ({
                        product_id: model.id,
                        quantity: model.quantity,
                    }))
                    .post(route("addProduct"),{
                        onSuccess : function (){
                            if(app.$page.props.product && (app.$page.props.product.id === model.id))
                                app.$page.props.productTo = app.$page.props.product;
                             else
                             app.$page.props.productTo = model;

                        }
                    });
            },
            submitD(item) {
                Inertia.delete(
                    route("cartitem.destroy", {
                        id: item.id,
                    }),
                    {
                        onSuccess: (res) => {},
                    }
                );
            },
            Pay() {
                this.$emit("Pay");
            },
            go(route){
                $('#add_to_cart_modal').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                Inertia.visit(this.route(route));
            }
        },
    }

</script>
