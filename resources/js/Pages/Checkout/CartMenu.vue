<template>
  <div>
    <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
      <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
          <span class="ltn__utilize-menu-title">{{ $t("listing.cart") }}</span>
          <span
            v-if="dform.processing"
            class="spinner-grow spinner-grow-sm"
            role="status"
            aria-hidden="true"
          ></span>
          <button class="ltn__utilize-close">×</button>
        </div>
        <div v-if="model" class="mini-cart-product-area ltn__scrollbar">
          <div
            v-for="item in model.cart_items"
            :key="item.id"
            class="mini-cart-item clearfix"
          >
            <div class="mini-cart-img">
              <a @click="go(item)" href="javascript: void(0)"
                ><img :src="item.product.fimage" alt="Image"
              /></a>
              <span @click="submitD(item)" class="mini-cart-item-delete"
                ><i class="icon-cancel"></i
              ></span>
            </div>
            <div class="mini-cart-info">
              <h6>
                <a @click="go(item)" href="javascript: void(0)">{{
                  item.product.lname
                }}</a>
              </h6>
              <span class="mini-cart-quantity"
                >{{ item.quantity }} x {{ $page.props.currency_code }}
                {{ item.qprice }}</span
              >
            </div>
          </div>
        </div>
        <div class="mini-cart-footer">
          <div class="mini-cart-sub-total">
            <h5>
              {{ $t("listing.total") }} :
              <span>{{ $page.props.currency_code }} {{ model ? model.citotal : 0 }}</span>
            </h5>
          </div>
          <div class="btn-wrapper mb-4">
            <Link :href="route('cartitem.index')" class="theme-btn-1 btn btn-effect-1">{{
              $t("listing.view_cart")
            }}</Link>
            <Link :href="route('checkout.show')" class="theme-btn-2 btn btn-effect-2">{{
              $t("listing.checkout")
            }}</Link>
          </div>
          <p>{{ $t("listing.cart_desc") }}</p>
        </div>
      </div>
    </div>
    <!--    <div-->
    <!--      v-if="model && model.citotal"-->
    <!--      class="generator-bg rounded shadow-sm mb-4 p-4 osahan-cart-item"-->
    <!--        >-->
    <!--      <div class="d-flex mb-4 osahan-cart-item-profile">-->
    <!--        <img class="img-fluid mr-3 rounded-pill" alt="osahan" :src="model.fimage" />-->
    <!--        <div class="d-flex flex-column">-->
    <!--          <h6 class="mb-1 text-white">{{ model.names }}</h6>-->
    <!--          &lt;!&ndash;                    <p class="mb-0 text-white"><i class="icofont-location-pin"></i> 2036 2ND AVE, NEW YORK, NY 10029</p>&ndash;&gt;-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="bg-white rounded shadow-sm mb-2">-->
    <!--        <div-->
    <!--          v-for="item in model.cart_items"-->
    <!--          :key="item.id"-->
    <!--          class="gold-members p-2 border-bottom"-->
    <!--        >-->
    <!--          <p class="text-gray mb-0 float-right ml-2">-->
    <!--            {{ $page.props.currency_code }} {{ item.qprice }}-->
    <!--          </p>-->
    <!--          <span class="count-number float-right">-->
    <!--            <button-->
    <!--              @click="incrQP(item, -1)"-->
    <!--              class="btn btn-outline-secondary btn-sm left dec"-->
    <!--            >-->
    <!--              <i class="icofont-minus"></i>-->
    <!--            </button>-->
    <!--            <input-->
    <!--              class="count-number-input"-->
    <!--              type="text"-->
    <!--              :value="item.quantity"-->
    <!--              readonly=""-->
    <!--            />-->
    <!--            <button-->
    <!--              @click="incrQP(item, +1)"-->
    <!--              class="btn btn-outline-secondary btn-sm right inc"-->
    <!--            >-->
    <!--              <i class="icofont-plus"></i>-->
    <!--            </button>-->
    <!--          </span>-->
    <!--          <div class="media align-content-center">-->
    <!--            <div @click="submitD(item)" class="mr-2">-->
    <!--              <i class="icofont-delete text-danger food-item"></i>-->
    <!--            </div>-->
    <!--            <div class="media-body">-->
    <!--              <p class="mt-1 mb-0 text-black">{{ item.product.name }}</p>-->
    <!--            </div>-->
    <!--          </div>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      &lt;!&ndash;            <div class="mb-2 bg-white rounded p-2 clearfix">&ndash;&gt;-->
    <!--      &lt;!&ndash;                <div class="input-group input-group-sm mb-2">&ndash;&gt;-->
    <!--      &lt;!&ndash;                    <input type="text" class="form-control" placeholder="Enter promo code">&ndash;&gt;-->
    <!--      &lt;!&ndash;                    <div class="input-group-append">&ndash;&gt;-->
    <!--      &lt;!&ndash;                        <button class="btn btn-primary" type="button" id="button-addon2"><i class="icofont-sale-discount"></i> APPLY</button>&ndash;&gt;-->
    <!--      &lt;!&ndash;                    </div>&ndash;&gt;-->
    <!--      &lt;!&ndash;                </div>&ndash;&gt;-->
    <!--      &lt;!&ndash;                <div class="input-group mb-0">&ndash;&gt;-->
    <!--      &lt;!&ndash;                    <div class="input-group-prepend">&ndash;&gt;-->
    <!--      &lt;!&ndash;                        <span class="input-group-text"><i class="icofont-comment"></i></span>&ndash;&gt;-->
    <!--      &lt;!&ndash;                    </div>&ndash;&gt;-->
    <!--      &lt;!&ndash;                    <textarea class="form-control" placeholder="Any suggestions? We will pass it on..." aria-label="With textarea"></textarea>&ndash;&gt;-->
    <!--      &lt;!&ndash;                </div>&ndash;&gt;-->
    <!--      &lt;!&ndash;            </div>&ndash;&gt;-->
    <!--      <div class="mb-2 bg-white rounded p-2 clearfix">-->
    <!--        <p class="mb-1">-->
    <!--          {{ $t("listing.total") }}-->
    <!--          <span class="float-right text-dark"-->
    <!--            >{{ $page.props.currency_code }} {{ model.citotal }}</span-->
    <!--          >-->
    <!--        </p>-->
    <!--        &lt;!&ndash;                <p class="mb-1">Restaurant Charges <span class="float-right text-dark">$62.8</span></p>&ndash;&gt;-->
    <!--        &lt;!&ndash;                <p class="mb-1">Delivery Fee <span class="text-info" data-toggle="tooltip" data-placement="top" title="Total discount breakup">&ndash;&gt;-->
    <!--        &lt;!&ndash;                           <i class="icofont-info-circle"></i>&ndash;&gt;-->
    <!--        &lt;!&ndash;                           </span> <span class="float-right text-dark">$10</span>&ndash;&gt;-->
    <!--        &lt;!&ndash;                </p>&ndash;&gt;-->
    <!--        &lt;!&ndash;                <p class="mb-1 text-success">Total Discount&ndash;&gt;-->
    <!--        &lt;!&ndash;                    <span class="float-right text-success">$1884</span>&ndash;&gt;-->
    <!--        &lt;!&ndash;                </p>&ndash;&gt;-->
    <!--        <hr />-->
    <!--        <h6 class="font-weight-bold mb-0">-->
    <!--          {{ $t("listing.to_pay") }}-->
    <!--          <span class="float-right"-->
    <!--            >{{ $page.props.currency_code }} {{ model.citotal }}</span-->
    <!--          >-->
    <!--        </h6>-->
    <!--      </div>-->
    <!--      <a @click="Pay" class="btn btn-success btn-block btn-lg"-->
    <!--        >{{ $t("listing.pay") }} {{ $page.props.currency_code }} {{ model.citotal }}-->
    <!--        <i class="icofont-long-arrow-right"></i-->
    <!--      ></a>-->
    <!--    </div>-->
    <!--        <div class="pt-2"></div>-->
    <!--    <div v-else class="generator-bg rounded shadow-sm mb-4 p-4 osahan-cart-item">-->
    <!--      <div class="d-flex mb-4 osahan-cart-item-profile">-->
    <!--        <img class="img-fluid mr-3 rounded-pill" alt="osahan" src="/img/checkout.png" />-->
    <!--        <div class="d-flex flex-column">-->
    <!--          <h6 class="mb-1 text-white">Empty list</h6>-->
    <!--          &lt;!&ndash;                    <p class="mb-0 text-white"><i class="icofont-location-pin"></i> 2036 2ND AVE, NEW YORK, NY 10029</p>&ndash;&gt;-->
    <!--        </div>-->
    <!--      </div>-->
    <!--      <div class="mb-2 bg-white rounded p-2 clearfix">-->
    <!--        <p class="mb-1">-->
    <!--          {{ $t("listing.total") }}-->
    <!--          <span class="float-right text-dark">{{ $page.props.currency_code }} 0</span>-->
    <!--        </p>-->
    <!--        &lt;!&ndash;                <p class="mb-1">Restaurant Charges <span class="float-right text-dark">$62.8</span></p>&ndash;&gt;-->
    <!--        &lt;!&ndash;                <p class="mb-1">Delivery Fee <span class="text-info" data-toggle="tooltip" data-placement="top" title="Total discount breakup">&ndash;&gt;-->
    <!--        &lt;!&ndash;                           <i class="icofont-info-circle"></i>&ndash;&gt;-->
    <!--        &lt;!&ndash;                           </span> <span class="float-right text-dark">$10</span>&ndash;&gt;-->
    <!--        &lt;!&ndash;                </p>&ndash;&gt;-->
    <!--        &lt;!&ndash;                <p class="mb-1 text-success">Total Discount&ndash;&gt;-->
    <!--        &lt;!&ndash;                    <span class="float-right text-success">$1884</span>&ndash;&gt;-->
    <!--        &lt;!&ndash;                </p>&ndash;&gt;-->
    <!--        <hr />-->
    <!--        <h6 class="font-weight-bold mb-0">-->
    <!--          {{ $t("listing.to_pay")-->
    <!--          }}<span class="float-right">{{ $page.props.currency_code }} 0</span>-->
    <!--        </h6>-->
    <!--      </div>-->
    <!--      <Link :href="route('listing')" class="btn btn-success btn-block btn-lg"-->
    <!--        >{{ $t("listing.add_products") }} <i class="icofont-long-arrow-right"></i-->
    <!--      ></Link>-->
    <!--    </div>-->

    <!--        <div class="alert alert-success" role="alert">-->
    <!--            You have saved <strong>$1,884</strong> on the bill-->
    <!--        </div>-->
  </div>
</template>

<script>
import { useForm, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useToast } from "vue-toastification";

export default {
  components: {
    Link,
  },
  data() {
    return {
      // model : this.$page.props.shopping_session
      tomodel: null,
      dform: useForm({}),
    };
  },
  computed: {
    model: function () {
      return this.$page.props.shopping_session;
    },
  },
  methods: {
    incrQP(item, by) {
      const toast = useToast();
      let q = item.quantity;
      let product = item.product;
      item.quantity = item.quantity + by;

      if (item.quantity > product.isA.remain) {
        item.quantity = product.isA.remain;
        toast.warning(this.$t("listing.limited") + product.lname);
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
          onSuccess: (res) => {},
        }
      );
    },
    Pay() {
      this.$emit("Pay");
    },
    go: function (item) {
      Inertia.get(item.product.surl);
    },
  },
};
</script>
