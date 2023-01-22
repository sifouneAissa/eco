<script>
import chooseAddress from "@/Pages/Checkout/chooseAddress.vue";
import choosePayment from "@/Pages/Checkout/choosePayment.vue";
import ProductCarousel from "@/Pages/Listing/ProductCarousel.vue";
import CartMenu from "@/Pages/Checkout/CartMenu.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { useToast } from "vue-toastification";

export default {
  components: {
    chooseAddress,
    choosePayment,
    ProductCarousel,
    CartMenu,
  },
  data() {
    return {
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
      if (model.toCreate) this.form.address_id = model;
      else this.form.address_id = model.id;
    },
    SelectPaymentMethod(data) {
      const toast = useToast();

      this.form.provider = data.type;
      this.form.paymentInfo = data.data;
      this.form.email = data.data.email;
      this.form.post(route("order.store"), {
        onSuccess: () => {
          toast.success(this.$t("notifications.success"));
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
    <section class="offer-dedicated-body mt-4 mb-4 pt-2 pb-2">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="offer-dedicated-body-left">
              <div
                v-if="$page.props.products.length != 0"
                class="bg-white rounded shadow-sm p-4 mb-4"
              >
                <!-- <h6 class="mb-3">You may also like</h6> -->
                <ProductCarousel :models="$page.props.products" />
              </div>

              <div class="pt-2"></div>
              <chooseAddress
                v-if="
                  $page.props.shopping_session && $page.props.shopping_session.citotal
                "
                @setSelectedAddress="setSelectedAddress"
                :models="$page.props.addresses"
              />
              <div class="pt-2"></div>
              <choosePayment
                v-if="
                  $page.props.shopping_session && $page.props.shopping_session.citotal
                "
                :form="form"
                :disable="this.form.address_id === null"
                @SelectPaymentMethod="SelectPaymentMethod"
              />
            </div>
          </div>
          <div class="col-md-4">
            <CartMenu @Pay="Pay" />
            <!--                        <div class="pt-2"></div>-->
            <!--                        <div class="text-center pt-2">-->
            <!--                            <img class="img-fluid" src="https://dummyimage.com/352x504/ccc/ffffff.png&text=Google+ads">-->
            <!--                        </div>-->
          </div>
        </div>
      </div>
    </section>
    <!-- <section class="section pt-5 pb-5 text-center bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="m-0">Operate food store or restaurants? <a href="login.html">Work With Us</a></h5>
                    </div>
                </div>
            </div>
        </section> -->
  </div>
</template>
