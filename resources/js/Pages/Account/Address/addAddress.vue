<script >

    import {useForm} from "@inertiajs/inertia-vue3";

    import vSelect  from "vue-select";

    export  default  {
        components : {
            vSelect
        },
        created() {
            let app = this;
            axios.get('/countries-states').then(response => {
                app.countries = response.data;
            });
        },
        watch : {
            'add_form.country' : function (o,n){
                this.add_form.city = null;
            }
        },
        data() {
                return {
                    countries : [],
                    add_form : useForm({
                        address_line_1: '',
                        address_line_2: '',
                        city : '',
                        postal_code : '',
                        country : '',
                        mobile : '',
                        // telephone : ''
                    })
                }
            },
        methods : {
            submit: function () {
                let app = this;
                this.add_form.transform(data => ({
                    ...data,
                    country : data.country?.name,
                    city : data.city?.name
                })).post(route('address.store'), {
                    // onFinish: () => add_form.reset(),
                    onSuccess : function () {
                        $('#add-address-modal').modal('hide');
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        app.add_form.reset('address_line_1','address_line_2','mobile');
                    }
                });
            }
        }
    }
    // const add_form = useForm({
    //     address_line_1: '',
    //     address_line_2: '',
    //     city : '',
    //     postal_code : '',
    //     country : '',
    //     mobile : '',
    //     telephone : ''
    // });
    //
    // const submit = () => {
    //
    //     add_form.transform(data => ({
    //         ...data,
    //     })).post(route('address.store'), {
    //         // onFinish: () => add_form.reset(),
    //         onSuccess : function () {
    //             $('#add-address-modal').modal('hide');
    //             $('body').removeClass('modal-open');
    //             $('.modal-backdrop').remove();
    //             add_form.reset('address_line_1','address_line_2','mobile');
    //         }
    //     });
    // };
</script>
<template>
    <div  class="ltn__modal-area">
    <div class="modal fade" id="add-address-modal" tabindex="-1" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-2" id="add-address">{{$t("account.addresses.add_card.title")}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="submit">
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="Country">{{$t("account.addresses.add_card.country")}}</label>
                                <!--                                <div class="input-group">-->
                                <!--                                    <input required type="text" v-model="add_form.country" class="form-control" id="Country" :placeholder="$t('account.addresses.add_card.country')">-->
                                <!--                                </div>-->
                                <v-select :dir="$page.props.isRtl ? 'rtl' : 'ltr'" :placeholder='$t("account.addresses.add_card.country")' v-model="add_form.country" :options="countries" label="name" ></v-select>


                                <div v-show="add_form.errors.country">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.country }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="city">{{$t("account.addresses.add_card.city")}}</label>
                                <!--                                <div class="input-group">-->
                                <!--                                    <input required type="text" v-model="add_form.city" class="form-control" id="city" :placeholder="$t('account.addresses.add_card.city')">-->
                                <!--                                </div>-->
                                <v-select :dir="$page.props.isRtl ? 'rtl' : 'ltr'" :placeholder='$t("account.addresses.add_card.city")'  v-model="add_form.city" :options="add_form.country ? add_form.country.states : []" label="name" ></v-select>


                                <div v-show="add_form.errors.city">
                                    <p class="text-sm text-red-600" style="color: red">
                                        {{ add_form.errors.city }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="address_line_1">{{$t("account.addresses.add_card.address1")}}</label>
                                <div class="input-group">
                                    <input required type="text" v-model="add_form.address_line_1" class="form-control" id="address_line_1" :placeholder="$t('account.addresses.add_card.address1')">
<!--                                    <div class="input-group-append">-->
<!--                                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="icofont-ui-pointer"></i></button>-->
<!--                                    </div>-->

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
<!--                            <div class="form-group col-md-6">-->
<!--                                <label for="telephone">{{$t("account.addresses.add_card.telephone")}}</label>-->
<!--                                <div class="input-group">-->
<!--                                    <input required type="text" v-model="add_form.telephone" class="form-control" id="telephone" :placeholder="$t('account.addresses.add_card.telephone')">-->
<!--                                </div>-->

<!--                                <div v-show="add_form.errors.telephone">-->
<!--                                    <p class="text-sm text-red-600" style="color: red">-->
<!--                                        {{ add_form.errors.telephone }}-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                            </div>-->
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
                            <button type="button" class="btn d-flex w-50 text-center justify-content-center btn-outline-warning" data-dismiss="modal">{{$t("account.addresses.add_card.cancel")}}
                            </button><button  type="submit" class="btn d-flex w-50 text-center justify-content-center btn-warning">{{$t("account.addresses.add_card.save")}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
        <!-- Utilize Cart Menu Start -->
<!--    <div id="ltn__utilize-add-address" class="ltn__utilize ltn__utilize-cart-menu">-->
<!--        <div class="ltn__utilize-menu-inner ltn__scrollbar">-->
<!--            <div class="ltn__utilize-menu-head">-->
<!--                <span class="ltn__utilize-menu-title">Cart</span>-->
<!--                <button class="ltn__utilize-close">×</button>-->
<!--            </div>-->
<!--            <div class="mini-cart-product-area ltn__scrollbar">-->
<!--                <div class="mini-cart-item clearfix">-->
<!--                    <div class="mini-cart-img">-->
<!--                        <a href="#"><img src="img/product/1.png" alt="Image"></a>-->
<!--                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>-->
<!--                    </div>-->
<!--                    <div class="mini-cart-info">-->
<!--                        <h6><a href="#">Beard Care Oil</a></h6>-->
<!--                        <span class="mini-cart-quantity">1 x $65.00</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="mini-cart-item clearfix">-->
<!--                    <div class="mini-cart-img">-->
<!--                        <a href="#"><img src="img/product/15.png" alt="Image"></a>-->
<!--                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>-->
<!--                    </div>-->
<!--                    <div class="mini-cart-info">-->
<!--                        <h6><a href="#">Beard Scissors</a></h6>-->
<!--                        <span class="mini-cart-quantity">1 x $15.00</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="mini-cart-item clearfix">-->
<!--                    <div class="mini-cart-img">-->
<!--                        <a href="#"><img src="img/product/9.png" alt="Image"></a>-->
<!--                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>-->
<!--                    </div>-->
<!--                    <div class="mini-cart-info">-->
<!--                        <h6><a href="#">Beard Shampoo</a></h6>-->
<!--                        <span class="mini-cart-quantity">1 x $92.00</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="mini-cart-item clearfix">-->
<!--                    <div class="mini-cart-img">-->
<!--                        <a href="#"><img src="img/product/4.png" alt="Image"></a>-->
<!--                        <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>-->
<!--                    </div>-->
<!--                    <div class="mini-cart-info">-->
<!--                        <h6><a href="#">Beard Growth Oil</a></h6>-->
<!--                        <span class="mini-cart-quantity">1 x $68.00</span>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="mini-cart-footer">-->
<!--                <div class="mini-cart-sub-total">-->
<!--                    <h5>Subtotal: <span>$310.00</span></h5>-->
<!--                </div>-->
<!--                <div class="btn-wrapper">-->
<!--                    <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>-->
<!--                    <a href="cart.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>-->
<!--                </div>-->
<!--                <p>Free Shipping on All Orders Over $100!</p>-->
<!--            </div>-->

<!--        </div>-->
<!--    </div>-->

</template>
