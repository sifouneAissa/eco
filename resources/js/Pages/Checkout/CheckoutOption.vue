<script>
import chooseAddress from "@/Pages/Checkout/chooseAddress.vue";
import choosePayment from "@/Pages/Checkout/choosePayment.vue";
import CartMenu from "@/Pages/Checkout/CartMenu.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { useToast } from "vue-toastification";
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {
    chooseAddress,
    choosePayment,
    CartMenu,
  },
  data() {
    return {
      show:
        this.$page.props.shopping_session &&
        this.$page.props.shopping_session.cart_items.length,
      form: useForm({
        address_id: null,
        user_id: this.$page.props.auth,
        provider: null,
        paymentInfo: null,
        email: null,
      }),
    };
  },
  methods: {
    setSelectedAddress(model) {
      if(!model) this.form.address_id = null;
      else if (model.toCreate) this.form.address_id = model;
      else this.form.address_id = model.id;
    },
    go() {
      Inertia.visit(route("listing"));
    },
    SelectPaymentMethod(data) {

      let app = this;
      const toast = useToast();
      this.form.provider = data.type;
      this.form.paymentInfo = data.data;
      this.form.email = data.data.email;

      if(this.form.address_id.toCreate){
          this.form.address_id.city = this.form.address_id.city?.name;
          this.form.address_id.country = this.form.address_id.country?.name;
      }

      this.form.post(route("order.store"), {
        onSuccess: () => {
          toast.success(app.$t("notifications.success"));
        },
        onError: (errors) => {
          toast.error(errors.error);
        },
      });
    },
    Pay() {
      if (!this.form.address_id)
        window.location.href = window.location.href.split("#")[0] + "#address";
      else window.location.href = window.location.href.split("#")[0] + "#payment";
    },
  },
};
</script>
<template>
  <div>
    <!--    <section class="offer-dedicated-body mt-4 mb-4 pt-2 pb-2">-->
    <!--      <div class="container">-->
    <!--        <div class="row">-->
    <!--          <div class="col-md-8">-->
    <!--            <div class="offer-dedicated-body-left">-->
    <!--              <div-->
    <!--                v-if="$page.props.products.length != 0"-->
    <!--                class="bg-white rounded shadow-sm p-4 mb-4"-->
    <!--              >-->
    <!--                &lt;!&ndash; <h6 class="mb-3">You may also like</h6> &ndash;&gt;-->
    <!--                <ProductCarousel :models="$page.props.products" />-->
    <!--              </div>-->

    <!--              <div class="pt-2"></div>-->
    <!--              <chooseAddress-->
    <!--                v-if="-->
    <!--                  $page.props.shopping_session && $page.props.shopping_session.citotal-->
    <!--                "-->
    <!--                @setSelectedAddress="setSelectedAddress"-->
    <!--                :models="$page.props.addresses"-->
    <!--              />-->
    <!--              <div class="pt-2"></div>-->
    <!--              <choosePayment-->
    <!--                v-if="-->
    <!--                  $page.props.shopping_session && $page.props.shopping_session.citotal-->
    <!--                "-->
    <!--                :form="form"-->
    <!--                :disable="this.form.address_id === null"-->
    <!--                @SelectPaymentMethod="SelectPaymentMethod"-->
    <!--              />-->
    <!--            </div>-->
    <!--          </div>-->
    <!--          <div class="col-md-4">-->
    <!--            <CartMenu @Pay="Pay" />-->
    <!--            &lt;!&ndash;                        <div class="pt-2"></div>&ndash;&gt;-->
    <!--            &lt;!&ndash;                        <div class="text-center pt-2">&ndash;&gt;-->
    <!--            &lt;!&ndash;                            <img class="img-fluid" src="https://dummyimage.com/352x504/ccc/ffffff.png&text=Google+ads">&ndash;&gt;-->
    <!--            &lt;!&ndash;                        </div>&ndash;&gt;-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </section>-->
    <div class="ltn__checkout-area margin-section">
      <div class="container">
        <div class="row">
          <div v-if="show" class="col-lg-12">
            <!-- <div class="ltn__checkout-inner">
              <div class="ltn__checkout-single-content ltn__returning-customer-wrap">
                <h5>
                  Returning customer?
                  <a
                    class="ltn__secondary-color"
                    href="#ltn__returning-customer-login"
                    data-toggle="collapse"
                    >Click here to login</a
                  >
                </h5>
                <div
                  id="ltn__returning-customer-login"
                  class="collapse ltn__checkout-single-content-info"
                >
                  <div class="ltn_coupon-code-form ltn__form-box">
                    <p>Please login your accont.</p>
                    <form action="#">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-item input-item-name ltn__custom-icon">
                            <input
                              type="text"
                              name="ltn__name"
                              placeholder="Enter your name"
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-item input-item-email ltn__custom-icon">
                            <input
                              type="email"
                              name="ltn__email"
                              placeholder="Enter email address"
                            />
                          </div>
                        </div>
                      </div>
                      <button class="btn theme-btn-1 btn-effect-1 text-uppercase">
                        Login
                      </button>
                      <label class="input-info-save mb-0"
                        ><input type="checkbox" name="agree" /> Remember me</label
                      >
                      <p class="mt-30"><a href="register.html">Lost your password?</a></p>
                    </form>
                  </div>
                </div>
              </div>
              <div class="ltn__checkout-single-content ltn__coupon-code-wrap">
                <h5>
                  Have a coupon?
                  <a
                    class="ltn__secondary-color"
                    href="#ltn__coupon-code"
                    data-toggle="collapse"
                    >Click here to enter your code</a
                  >
                </h5>
                <div
                  id="ltn__coupon-code"
                  class="collapse ltn__checkout-single-content-info"
                >
                  <div class="ltn__coupon-code-form">
                    <p>If you have a coupon code, please apply it below.</p>
                    <form action="#">
                      <input type="text" name="coupon-code" placeholder="Coupon code" />
                      <button class="btn theme-btn-2 btn-effect-2 text-uppercase">
                        Apply Coupon
                      </button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="pt-2"></div>
            </div> -->

            <chooseAddress
              v-if="$page.props.shopping_session && $page.props.shopping_session.citotal"
              @setSelectedAddress="setSelectedAddress"
              :models="$page.props.addresses"
            />
          </div>
          <div class="col-lg-6">
            <div v-if="show" class="ltn__checkout-payment-method margin-section2">
              <!--                          <h4 class="title-2">Payment Method</h4>-->
              <!--                          <div id="checkout_accordion_1">-->
              <!--                              &lt;!&ndash; card &ndash;&gt;-->
              <!--                              <div class="card">-->
              <!--                                  <h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-1" aria-expanded="false">-->
              <!--                                      Check payments-->
              <!--                                  </h5>-->
              <!--                                  <div id="faq-item-2-1" class="collapse" data-parent="#checkout_accordion_1">-->
              <!--                                      <div class="card-body">-->
              <!--                                          <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>-->
              <!--                                      </div>-->
              <!--                                  </div>-->
              <!--                              </div>-->
              <!--                              &lt;!&ndash; card &ndash;&gt;-->
              <!--                              <div class="card">-->
              <!--                                  <h5 class="ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-2" aria-expanded="true">-->
              <!--                                      Cash on delivery-->
              <!--                                  </h5>-->
              <!--                                  <div id="faq-item-2-2" class="collapse show" data-parent="#checkout_accordion_1">-->
              <!--                                      <div class="card-body">-->
              <!--                                          <p>Pay with cash upon delivery.</p>-->
              <!--                                      </div>-->
              <!--                                  </div>-->
              <!--                              </div>-->
              <!--                              &lt;!&ndash; card &ndash;&gt;-->
              <!--                              <div class="card">-->
              <!--                                  <h5 class="collapsed ltn__card-title" data-toggle="collapse" data-target="#faq-item-2-3" aria-expanded="false" >-->
              <!--                                      PayPal <img src="img/icons/payment-3.png" alt="#">-->
              <!--                                  </h5>-->
              <!--                                  <div id="faq-item-2-3" class="collapse" data-parent="#checkout_accordion_1">-->
              <!--                                      <div class="card-body">-->
              <!--                                          <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>-->
              <!--                                      </div>-->
              <!--                                  </div>-->
              <!--                              </div>-->
              <!--                          </div>-->
              <!--                          <div class="ltn__payment-note mt-30 mb-30">-->
              <!--                              <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>-->
              <!--                          </div>-->
              <!--                          <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button>-->
              <choosePayment
                v-if="
                  $page.props.shopping_session && $page.props.shopping_session.citotal
                "
                :form="form"
                :disable="this.form.address_id === null"
                @SelectPaymentMethod="SelectPaymentMethod"
              />
            </div>
            <div v-else class="ltn__checkout-payment-method margin-section2">
              <button class="btn theme-btn-1 btn-effect-1 text-uppercase" @click="go()">
                {{ $t("listing.add_products") }}
              </button>
            </div>
          </div>
          <div class="col-lg-6">
            <div v-if="show" class="shoping-cart-total mt-50">
              <h4 class="title-2">{{ $t("listing.cart_total") }}</h4>
              <table class="table">
                <tbody>
                  <tr
                    v-for="item in $page.props.shopping_session.cart_items"
                    :key="item.id"
                  >
                    <td>
                      {{ item.product.lname }} <strong>× {{ item.quantity }}</strong>
                    </td>
                    <td>{{ $page.props.currency_code }} {{ item.qprice }}</td>
                  </tr>
                  <tr>
                    <td>
                      <strong>{{ $t("listing.total") }} </strong>
                    </td>
                    <td>
                      <strong
                        >{{ $page.props.currency_code }}
                        {{ $page.props.shopping_session.citotal }}</strong
                      >
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
@media only screen and (min-width: 800px) {
  .margin-section {
    margin-bottom: 80px;
  }
  .margin-section2 {
    margin-top: 80px;
  }
}
@media only screen and (max-width: 600px) {
  .margin-section {
    margin-bottom: 40px;
  }
  .margin-section2 {
    margin-top: 40px;
  }
}
</style>
