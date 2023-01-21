<script >
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import AccountLayout from '@/Pages/Account/Layout.vue';
    import breadcrumb from '@/Pages/Common/breadcrumb.vue';
    import {Inertia} from "@inertiajs/inertia";
    import {useToast} from "vue-toastification";
    import {useForm,Link} from "@inertiajs/inertia-vue3";
    export default  {
        components : {
            GuestLayout,
            breadcrumb,
            Link
        },
        mounted() {

            let app = this;
            if(this.$page.props.shopping_session) {
                let session = JSON.parse(JSON.stringify(this.$page.props.shopping_session));
                session.cart_items.map((item) => {
                    let product = item.product;
                    let q = item.quantity;

                    $("#qid" + item.id).click(function () {
                        let id = "#quid" + item.id;

                        if ($(id).val() > product.isA.remain) {
                            const toast = useToast();
                            $(id).val(product.isA.remain)
                            toast.warning(app.$t("listing.limited") + product.name);
                        }

                        if ($(id).val() === '0')
                            $(id).val('1');

                        item.quantity = $(id).val();
                        console.log(q,item.quantity);
                        if (q !== parseInt(item.quantity))  app.submit(item)

                    });
                });
            }
        },
        data () {
            return {
                dform : useForm({

                })
            }
        },
        methods : {
            go: function (item) {
                Inertia.get(route("product.show", { id: item.product_id }));
            },
            incrQP(item, by) {
                const toast = useToast();
                let q = item.quantity;
                let product = item.product;
                item.quantity = item.quantity + by;

                if (item.quantity > product.isA.remain) {
                    item.quantity = product.isA.remain;
                    toast.warning(this.$t("listing.limited")  + product.name);
                }

                if (!item.quantity) item.quantity = 1;

                if (q !== item.quantity) this.submit(item, by);
            },
            submit: function (item) {
                let form = useForm({
                    quantity: item.quantity,
                });

                form
                    .transform((data) => ({
                        ...data,
                    }))
                    .patch(
                        route("cartitem.update", {
                            id: item.id,
                        }),
                        {
                            preserveScroll : true,
                            onSuccess: (res) => {},
                        }
                    );
            },
            submitD(item) {
                this.dform.delete(
                    route("cartitem.destroy", {
                        id: item.id,
                    }),
                    {
                        preserveScroll : true,
                        onSuccess: (res) => {},
                    }
                );
            },
        }
    }

</script>

<template>
    <GuestLayout :title="$t('listing.cart')">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{$t('listing.cart')}}
            </h2>
        </template>

        <!-- BREADCRUMB AREA START -->
        <breadcrumb  :title="$t('listing.cart')" />
        <!-- BREADCRUMB AREA END -->

        <!-- SHOPING CART AREA START -->
        <div class="liton__shoping-cart-area mb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping-cart-inner">
                            <div class="shoping-cart-table table-responsive">
                                <table class="table">
                                    <tbody v-if="$page.props.shopping_session">
                                    <tr
                                        v-for="item in $page.props.shopping_session.cart_items"
                                        :key="item.id"
                                         >
                                        <td @click="submitD(item)" class="cart-product-remove">x</td>
                                        <td  class="cart-product-image">
                                            <a @click="go(item)" href="javascript: void(0)"><img :src="item.product.fimage" alt="#"></a>
                                        </td>
                                        <td class="cart-product-info">
                                            <h4><a @click="go(item)" href="javascript: void(0)">{{item.product.name}}</a></h4>
                                        </td>
                                        <td class="cart-product-price">{{$page.props.currency_code }} {{item.product.cprice}}</td>
                                        <td class="cart-product-quantity">
                                            <div :id="'qid'+item.id" class="cart-plus-minus">
                                                <input :id="'quid'+item.id" type="text" :value="item.quantity" name="qtybutton" class="cart-plus-minus-box">
                                            </div>
                                        </td>
                                        <td class="cart-product-subtotal">{{$page.props.currency_code}} {{item.qprice}}</td>
                                    </tr>

                                    <tr class="cart-coupon-row">
                                        <td colspan="6">
                                            <div class="cart-coupon">
                                                <input type="text" name="cart-coupon" placeholder="Coupon code">
                                                <button type="submit" class="btn theme-btn-2 btn-effect-2">Apply Coupon</button>
                                            </div>
                                        </td>
<!--                                        <td>-->
<!--                                            <button type="submit" class="btn theme-btn-2 btn-effect-2&#45;&#45; disabled">Update Cart</button>-->
<!--                                        </td>-->
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="shoping-cart-total mt-50">
                                <h4>Cart Totals</h4>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Cart Subtotal</td>
                                        <td>{{$page.props.currency_code }} {{$page.props.shopping_session?.citotal}}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping and Handing</td>
                                        <td>{{$page.props.currency_code }} 00.00</td>
                                    </tr>
                                    <tr>
                                        <td>Vat</td>
                                        <td>{{$page.props.currency_code }} 00.00</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Order Total</strong></td>
                                        <td><strong>{{$page.props.currency_code }} {{$page.props.shopping_session?.citotal}}</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="btn-wrapper text-right">
                                    <Link v-if="$page.props.shopping_session && $page.props.shopping_session.cart_items.length" :href="route('checkout.show')" class="theme-btn-1 btn btn-effect-1">Proceed to checkout</Link>
                                    <Link v-else :href="route('listing')" class="theme-btn-1 btn btn-effect-1">Add Products</Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOPING CART AREA END -->

    </GuestLayout>
</template>


