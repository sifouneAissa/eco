<template>
  <div class="ltn__product-item ltn__product-item-3 text-center">
    <div class="product-img">
      <a @click="go()" href="javascript: void(0)"
        ><img
          :style="
            'width: 100%; ' +
            (img_height ? ('height: ' + img_height + 'px') : 'height:200px')
          "
          :src="model.fimage"
          alt="#"
      /></a>
      <!--            <div class="product-badge ">-->
      <!--                <ul >-->
      <!--                    <li v-if="model.popular" class="sale-badge">Popular</li>-->
      <li v-if="model.new" class="sale-badge">{{ $t("listing.new") }}</li>
      <!--                    <li v-else-if="model.bests" class="sale-badge">Bests</li>-->
      <!--                </ul>-->
      <!--            </div>-->
      <div class="product-hover-action">
        <ul>
          <li @click="$page.props.productTo = model">
            <a
              href="#"
              :title="$t('dashboard.section3.quick_view')"
              data-toggle="modal"
              :data-target="'#quick_view_modal'"
            >
              <i class="far fa-eye"></i>
            </a>
          </li>
          <li @click="$page.props.productTo = model">
            <a
              href="#"
              :title="$t('dashboard.section3.add_cart')"
              data-toggle="modal"
              :data-target="'#add_to_cart_modal'"
            >
              <i class="fas fa-shopping-cart"></i>
            </a>
          </li>
          <li @click="$page.props.productTo = model">
            <a
              href="#"
              :title="$t('dashboard.section3.wishlist')"
              data-toggle="modal"
              data-target="#liton_wishlist_modal"
            >
              <i class="far fa-heart"></i
            ></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="product-info">
      <h2 class="product-title">
        <Link :href="route('product.show', { id: model.id })">{{ model.name }}</Link>
      </h2>
      <div class="product-price">
        <span>{{ $page.props.currency_code }} {{ model.cprice }}</span>
        <del>{{ $page.props.currency_code }} {{ model.coprice }}</del>
      </div>
    </div>
  </div>
</template>

<script>
import { useForm, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useToast } from "vue-toastification";

export default {
  props: ["model", "img_height"],
  components: {
    Link,
  },
  mounted() {
        console.log("tihs.img_height")
        console.log(this.img_height)
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
    go: function () {
      Inertia.get(route("product.show", { id: this.model.id }));
    },
  },
};
</script>
