<template>
  <GuestLayout :title="title">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ title }}
      </h2>
    </template>

    <!-- BREADCRUMB AREA START -->
    <breadcrumb :title="$t('nav_menu.pages.products')" />
    <!--            <banner/>-->
    <!--            <tabs @ShowCheckout="ShowCheckout" />-->
    <!--            <recommended/>-->
    <!--            <footer/>-->
    <!--            <CheckoutCard :model="model" v-if="model && checkout" />-->

    <!-- SHOP DETAILS AREA START -->
    <div class="ltn__shop-details-area padding-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12">
            <productImgs />
            <!-- Shop Tab Start -->
            <Details />
            <!-- Shop Tab End -->
          </div>

          <div class="col-lg-4">
            <topRated v-if="Object.keys(this.$page.props.bestSellers).length" />
          </div>
        </div>
      </div>
    </div>
    <!-- SHOP DETAILS AREA END -->

    <!-- PRODUCT SLIDER AREA START -->
    <div class="ltn__product-slider-area padding-section">
      <related
        v-if="Object.keys($page.props.sameCategory).length"
        :models="$page.props.sameCategory"
      />
    </div>
    <!-- PRODUCT SLIDER AREA END -->
  </GuestLayout>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
// import footer from '@/Pages/Products/footer.vue';
// import banner from '@/Pages/Products/banner.vue';
// import recommended from '@/Pages/Products/recomended.vue';
// import tabs from '@/Pages/Products/tabs.vue';
// import CheckoutCard from "@/Pages/Checkout/CheckoutCard.vue";
// import {useToast} from "vue-toastification";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";
import Details from "@/Pages/Products/details.vue";
import related from "@/Pages/Products/related.vue";
import topRated from "@/Pages/Products/topRated.vue";
import productImgs from "@/Pages/Products/productImgs.vue";

export default {
  components: {
    GuestLayout,
    // footer,
    // banner,
    // recommended,
    // tabs,
    // CheckoutCard,
    breadcrumb,
    Details,
    related,
    topRated,
    productImgs,
  },
  props: ["title"],
  name: "Layout.vue",
  data() {
    return {
      checkout: false,
      model: null,
    };
  },
  mounted() {},
  computed: {
    // toast : function (){
    //     return !this.$page.props.message;
    // }
  },
  methods: {
    ShowCheckout: function (data) {
      this.checkout = true;
      this.model = data;
      window.location.href = window.location.href.split("#")[0] + "#checkout-payment";
    },
  },
};
</script>

<style scoped>
@media only screen and (min-width: 800px) {
  .padding-section {
    padding-bottom: 80px;
    padding-top: 0px;
  }
}
@media only screen and (max-width: 600px) {
  .padding-section {
    padding-bottom: 40px;
    padding-top: 0px;
  }
}
</style>
