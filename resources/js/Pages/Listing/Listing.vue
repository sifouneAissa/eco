<template>
  <div class="margin-section">
    <div class="ltn__gallery-active row ltn__gallery-style-2 ltn__gallery-info-hide---">
      <div class="ltn__gallery-sizer col-1"></div>
      <!-- gallery-item -->
      <div
        v-for="(product, index) in $page.props.products"
        :key="product.id"
        :class="
          'ltn__gallery-item col-lg-3 col-md-4 col-sm-6 col-12' +
          ' filter_category_' +
          product.product_category_id
        "
      >
        <ProductCard :model="product" :img_height="200" />
      </div>
    </div>
    <div class="btn-wrapper text-center mt-0">
      <a href="#" class="btn btn-transparent btn-effect-3 btn-border">
        <span
          class="spinner-grow spinner-grow-sm"
          role="status"
          aria-hidden="true"
        ></span>
        {{ $t("listing.loading") }}</a
      >
    </div>
  </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { useForm, Head, Link } from "@inertiajs/inertia-vue3";
import Categories from "@/Pages/Listing/Categories.vue";
import { useToast } from "vue-toastification";
import ProductCard from "@/Pages/Listing/ProductCard.vue";

export default {
  name: "listing.vue",
  components: { Categories, Link, ProductCard },
  date() {
    return {
      quantity: [],
      tomodel: this.$page.props.products[0],
    };
  },
  methods: {
    incrQP(model, by) {
      const toast = useToast();
      model.quantity = model.quantity + by;
      if (model.quantity > model.isA.remain) {
        model.quantity = model.isA.remain;
        toast.warning(this.$t("listing.limited") + model.name);
      }

      if (!model.quantity) model.quantity = 1;
    },
    submit: function (model) {
      let form = useForm({
        product_id: model.id,
        quantity: model.quantity,
      });

      form
        .transform((data) => ({
          ...data,
        }))
        .post(route("addProduct"), {
          // onFinish: () => add_form.reset(),
          onSuccess: function () {},
        });
    },
  },
};
</script>

<style scoped>
@media only screen and (min-width: 800px) {
  .margin-section {
    margin-bottom: 80px;
  }
}
@media only screen and (max-width: 600px) {
  .margin-section {
    margin-bottom: 40px;
  }
}
</style>
