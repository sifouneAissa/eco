<template>
    <div class="ltn__product-item ltn__product-item-3 text-center">
        <div class="product-img">
            <a @click="go()" href="javascript: void(0)"><img style="height: 200px" :src="model.fimage" alt="#"></a>
            <div class="product-badge">
                <ul>
                    <li class="sale-badge">New</li>
                </ul>
            </div>
            <div class="product-hover-action">
                <ul>
                    <li @click="$page.props.productTo=model">
                        <a href="#" title="Quick View" data-toggle="modal" :data-target="'#quick_view_modal'">
                            <i    class="far fa-eye"></i>
                        </a>
                    </li>
                    <li @click="$page.props.productTo=model">
                        <a  href="#" title="Add to Cart" data-toggle="modal" :data-target="'#add_to_cart_modal'">
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Wishlist" data-toggle="modal" data-target="#liton_wishlist_modal">
                            <i class="far fa-heart"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-info">
            <h2 class="product-title"><a href="product-details.html">{{model.name}}</a></h2>
            <div class="product-price">
                <span>{{ $page.props.currency_code }} {{ model.cprice }}</span>
                <del>{{ $page.props.currency_code }} 00.00</del>
            </div>
        </div>
    </div>
</template>

<script>
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { useToast } from "vue-toastification";

export default {
  props: ["model"],

  methods: {
    // incrQP(model, by) {
    //   const toast = useToast();
    //
    //   model.quantity = model.quantity + by;
    //   if (model.quantity > model.isA.remain) {
    //     toast.warning(this.$t("listing.limited")  + model.name);
    //     model.quantity = model.isA.remain;
    //   }
    //
    //   if (!model.quantity) model.quantity = 1;
    // },
    // submit: function (model) {
    //   let app = this;
    //   let form = useForm({
    //     product_id: model.id,
    //     quantity: model.quantity,
    //   });
    //
    //   form
    //     .transform((data) => ({
    //       ...data,
    //     }))
    //     .post(route("addProduct"), {
    //       // onFinish: () => add_form.reset(),
    //       onSuccess: function (res) {
    //         Inertia.reload();
    //       },
    //     });
    // },
      incrQP(model, by) {
          const toast = useToast();
          model.quantity = model.quantity + by;
          if (model.quantity > model.isA.remain) {
              model.quantity = model.isA.remain;
              toast.warning(this.$t("listing.limited")  + model.name);
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
