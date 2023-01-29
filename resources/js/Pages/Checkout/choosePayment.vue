<template>
  <div
    id="payment"
    v-if="model && price"
    :class="'bg-white rounded shadow-sm p-4 osahan-payment ' + (disable ? 'ddiv' : '')"
  >
    <!--    <h4 class="mb-1">{{ $t("listing.checkout_card.choose_payment") }}</h4>-->
    <!--    <h6 class="mb-3 text-black-50">{{ $t("listing.checkout_card.desc_payment") }}</h6>-->
    <h4 class="title-2">{{ $t("listing.checkout_card.choose_payment") }}</h4>
    <div id="checkout_accordion_1">
      <div class="card">
        <h5
          class="ltn__card-title"
          data-toggle="collapse"
          data-target="#faq-item-2-2"
          aria-expanded="true"
        >
          {{ $t("listing.checkout_card.pay_on_delivery") }}
        </h5>
        <div id="faq-item-2-2" class="collapse show" data-parent="#checkout_accordion_1">
          <div class="card-body">
            <div class="col-12 pl-0">
              <div class="tab-content h-100" id="v-pills-tabContent1">
                <div
                  class="tab-pane fade show active"
                  id="v-pills-home1"
                  role="tabpanel"
                  aria-labelledby="v-pills-home-tab"
                >
                  <p>{{ $t("listing.checkout_card.delivery") }}</p>
                  <!--                          <h6 class="mb-3 mt-0 mb-3">{{ $t("listing.checkout_card.add_card") }}</h6>-->
                  <form @submit.prevent="SelectPaymentMethod('payondelivery')">
                    <div
                      v-if="
                        !(
                          $page.props.shopping_session &&
                          $page.props.shopping_session.user_id
                        )
                      "
                      class="form-group col-md-12"
                    >
                      <label>{{ $t("listing.checkout_card.name") }} </label>
                      <input
                        required
                        v-model="payonD.name"
                        type="text"
                        class="form-control"
                        :placeholder="$t('listing.checkout_card.enter_your_name')"
                      />
                    </div>
                    <div
                      v-if="
                        !(
                          $page.props.shopping_session &&
                          $page.props.shopping_session.user_id
                        )
                      "
                      class="form-group col-md-12"
                    >
                      <label>{{ $t("listing.checkout_card.email") }} </label>
                      <input
                        required
                        v-model="payonD.email"
                        type="email"
                        class="form-control"
                        placeholder="xxxx@xxx.xx"
                      />
                      <div v-show="form.errors.email">
                        <p class="text-sm text-red-600" style="color: red">
                          {{ form.errors.email }}
                        </p>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block btn-lg">
                      {{ $t("listing.checkout_card.pay") }} {{ props.currency_code }}
                      {{ price }}
                      <i class="icofont-long-arrow-right"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- card -->
      <div class="card">
        <h5
          class="collapsed ltn__card-title"
          data-toggle="collapse"
          data-target="#faq-item-2-3"
          aria-expanded="false"
        >
          PayPal <img src="/img/icons/payment-3.png" alt="#"  />
        </h5>
        <div id="faq-item-2-3" class="collapse" data-parent="#checkout_accordion_1">
          <div class="col-12 pl-0">
            <div class="tab-content h-100" id="v-pills-tabContent1">
              <div
                class="tab-pane fade show active"
                id="v-pills-home1"
                role="tabpanel"
                aria-labelledby="v-pills-home-tab"
              >
                <p>{{ $t("listing.checkout_card.pay_with") }} Paypal.</p>
                <!--                        <h6 class="mb-3 mt-0 mb-3">{{ $t("listing.checkout_card.add_card") }}</h6>-->
                <PayPal
                  :smodel="this.smodel"
                  :creditC="this.netbank"
                  @SelectPaymentMethod="SelectPaymentMethod"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- card -->
      <div class="card">
        <h5
          class="collapsed ltn__card-title"
          data-toggle="collapse"
          data-target="#faq-item-2-4"
          aria-expanded="false"
        >
          {{ $t("listing.checkout_card.credit_cards") }}
          <span class="h2 text-secondary m-2">
            <i></i>
            <i class="icofont-visa-alt"></i>
            <i class="icofont-mastercard-alt"></i>
            <i class="icofont-american-express-alt"></i>
            <i class="icofont-payoneer-alt"></i>
            <i class="icofont-apple-pay-alt"></i>
            <i class="icofont-bank-transfer-alt"></i>
            <i class="icofont-discover-alt"></i>
            <i class="icofont-jcb-alt"></i>
          </span>
        </h5>
        <div id="faq-item-2-4" class="collapse" data-parent="#checkout_accordion_1">
          <div class="card-body">
            <div class="col-12 pl-0">
              <div class="tab-content h-100" id="v-pills-tabContent">
                <div
                  class="tab-pane fade show active"
                  id="v-pills-home"
                  role="tabpanel"
                  aria-labelledby="v-pills-home-tab"
                >
                  <p>
                    {{ $t("listing.checkout_card.desc_payment") }}
                  </p>
                  <h6 class="mb-3 mt-0 mb-3">
                    {{ $t("listing.checkout_card.add_card") }}
                  </h6>
                  <!--                  <p>-->
                  <!--                    {{ $t("listing.checkout_card.accept") }}-->
                  <!--                    <span class="h2 text-secondary m-2">-->
                  <!--                    <i></i>-->
                  <!--                    <i class="icofont-visa-alt"></i>-->
                  <!--                    <i class="icofont-mastercard-alt"></i>-->
                  <!--                    <i class="icofont-american-express-alt"></i>-->
                  <!--                    <i class="icofont-payoneer-alt"></i>-->
                  <!--                    <i class="icofont-apple-pay-alt"></i>-->
                  <!--                    <i class="icofont-bank-transfer-alt"></i>-->
                  <!--                    <i class="icofont-discover-alt"></i>-->
                  <!--                    <i class="icofont-jcb-alt"></i>-->
                  <!--              </span>-->
                  <!--                  </p>-->
                  <form method="post" class="card-form">
                    <div class="form-row">
                      <!--                                <input type="hidden" name="_token" :value="csrf">-->
                      <!--                                <input type="hidden" v-model="credit.paymentMethod"  name="payment_method" class="payment-method">-->
                      <div
                        v-if="
                          !(
                            $page.props.shopping_session &&
                            $page.props.shopping_session.user_id
                          )
                        "
                        class="form-group col-md-12"
                      >
                        <label>{{ $t("listing.checkout_card.name_card") }}</label>
                        <input
                          name="card_holder_name"
                          required
                          v-model="credit.name"
                          type="text"
                          class="form-control"
                          :placeholder="$t('listing.checkout_card.enter_name')"
                        />
                      </div>
                      <div
                        v-if="
                          !(
                            $page.props.shopping_session &&
                            $page.props.shopping_session.user_id
                          )
                        "
                        class="form-group col-md-12"
                      >
                        <label>{{ $t("listing.checkout_card.email") }} </label>
                        <input
                          required
                          v-model="credit.email"
                          type="email"
                          class="form-control"
                          placeholder="xxxx@xxx.xx"
                        />
                      </div>

                      <div class="form-group col-md-12">
                        <div id="card-element"></div>
                      </div>

                      <div id="card-errors" role="alert"></div>

                      <!--                                <div class="form-group col-md-12">-->
                      <!--                                    <label for="inputPassword4">Card number</label>-->
                      <!--                                    <div class="input-group">-->
                      <!--                                        <input required v-model="credit.card_number" type="number" class="form-control" placeholder="Card number">-->
                      <!--                                        <div class="input-group-append">-->
                      <!--                                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="icofont-card"></i></button>-->
                      <!--                                        </div>-->
                      <!--                                    </div>-->
                      <!--                                </div>-->
                      <!--                                <div class="form-group col-md-8">-->
                      <!--                                    <label>Valid through(MM/YY)-->
                      <!--                                    </label>-->
                      <!--                                    <input required v-model="credit.date" type="number" class="form-control" placeholder="Enter Valid through(MM/YY)">-->
                      <!--                                </div>-->
                      <!--                                <div class="form-group col-md-4">-->
                      <!--                                    <label>CVV-->
                      <!--                                    </label>-->
                      <!--                                    <input required v-model="credit.cvv" type="number" class="form-control" placeholder="Enter CVV Number">-->
                      <!--                                </div>-->

                      <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                          <input
                            type="checkbox"
                            class="custom-control-input"
                            id="customCheck1"
                          />
                          <label class="custom-control-label" for="customCheck1">{{
                            $t("listing.checkout_card.save_card")
                          }}</label>
                        </div>
                      </div>
                      <div class="form-group col-md-12 mb-0">
                        <button
                          type="submit"
                          class="btn btn-success btn-block btn-lg pay"
                        >
                          {{ $t("listing.checkout_card.pay") }} {{ props.currency_code }}
                          {{ price }}
                          <i class="icofont-long-arrow-right"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ltn__payment-note mt-30 mb-30">
      <p>
        {{ $t("listing.checkout_card.desc") }}
      </p>
    </div>
    <!--    <button class="btn theme-btn-1 btn-effect-1 text-uppercase" type="submit">Place order</button>-->
  </div>
</template>

<script>
import "https://js.stripe.com/v3/";
import PayPal from "@/Pages/Checkout/paypalCheckout.vue";

export default {
  props: ["disable", "form", "smodel"],
  components: {
    PayPal,
  },
  mounted() {
    let app = this;
    $(document).ready(function () {
      let stripe = Stripe(app.$page.props.STRIPE_KEY);
      let elements = stripe.elements();
      let style = {
        base: {
          color: "#32325d",
          fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
          fontSmoothing: "antialiased",
          fontSize: "16px",
          "::placeholder": {
            color: "#aab7c4",
          },
        },
        invalid: {
          color: "#fa755a",
          iconColor: "#fa755a",
        },
      };
      let card = elements.create("card", { style: style });
      card.mount("#card-element");
      let paymentMethod = null;
      $(".card-form").on("submit", function (e) {
        $("button.pay").attr("disabled", true);
        if (paymentMethod) {
          return true;
        }
        stripe
          .confirmCardSetup(app.$page.props.client_secret, {
            payment_method: {
              card: card,
              billing_details: { name: $(".card_holder_name").val() },
            },
          })
          .then(function (result) {
            if (result.error) {
              $("#card-errors").text(result.error.message);
              $("button.pay").removeAttr("disabled");
            } else {
              paymentMethod = result.setupIntent.payment_method;
              $(".payment-method").val(paymentMethod);
              // $('.card-form').submit()
              app.credit.paymentMethod = paymentMethod;
              $("button.pay").removeAttr("disabled");
              app.SelectPaymentMethod("credit");
            }
          });
        return false;
      });
    });
  },
  computed: {
    model: function () {
      return this.smodel ? this.smodel : this.props.shopping_session;
    },
    props: function () {
      return this.$page.props;
    },
    price: function () {
      return this.smodel ? this.smodel.cprice * this.model.quantity : this.model.citotal;
    },
  },
  data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      credit: {
        card_number: null,
        date: null,
        cvv: null,
        name: this.$page.props.shopping_user?.name,
        paymentMethod: null,
        _token: this.csrf,
        email: this.$page.props.shopping_user?.email,
      },
      netbank: {
        paypal: true,
        email: this.$page.props.shopping_user?.email,
        name: this.$page.props.shopping_user?.name,
      },
      payonD: {
        email: this.$page.props.shopping_user?.email,
        name: this.$page.props.shopping_user?.name,
      },
    };
  },
  methods: {
    SelectPaymentMethod: function (type) {
      let types = {
        credit: this.credit,
        netbanking: this.netbank,
        payondelivery: this.payonD,
      };

      this.$emit("SelectPaymentMethod", {
        data: types[type],
        type: type,
      });
    },
  },
};
</script>

<style scoped>
.StripeElement {
  box-sizing: border-box;
  height: 40px;
  padding: 10px 12px;
  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;
  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}
.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}
.StripeElement--invalid {
  border-color: #fa755a;
}
.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
.ddiv {
  pointer-events: none;

  opacity: 0.4;
}
</style>
