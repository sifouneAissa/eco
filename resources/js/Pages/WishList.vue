<template>
  <GuestLayout :title="$t('nav_menu.pages.wishlist')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("nav_menu.pages.wishlist") }}
      </h2>
    </template>

    <!-- BREADCRUMB AREA START -->
    <breadcrumb :title="$t('nav_menu.pages.wishlist')" />
    <!-- BREADCRUMB AREA END -->

    <!-- WISHLIST AREA START -->
    <div class="liton__wishlist-area mb-80">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="shoping-cart-inner">
              <div class="shoping-cart-table table-responsive">
                <table class="table">
                  <tbody>
                    <tr v-for="model in models" :key="model.id">
                      <td @click="submitD(model)" class="cart-product-remove">x</td>
                      <td class="cart-product-image">
                        <Link :href="model.product.surl"
                          ><img :src="model.product.fimage" alt="#"
                        /></Link>
                      </td>
                      <td class="cart-product-info">
                        <h4>
                          <Link :href="model.product.surl">{{
                            model.product.lname
                          }}</Link>
                        </h4>
                      </td>
                      <td class="cart-product-price">
                        {{ $page.props.currency_code }} {{ model.product.cprice }}
                      </td>
                      <td class="cart-product-stock">
                        {{
                          model.product.isA.isA
                            ? $t("wishlist.in_stock")
                            : $t("wishlist.not_available")
                        }}
                      </td>
                      <td
                        v-if="model.product.isA.isA"
                        @click="$page.props.productTo = model.product"
                        class="cart-product-add-cart"
                      >
                        <a
                          class="submit-button-1"
                          href="#"
                          title="Add to Cart"
                          data-toggle="modal"
                          data-target="#add_to_cart_modal"
                        >
                          {{ $t("dashboard.section3.add_cart") }}</a
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
    <!-- WISHLIST AREA START -->
  </GuestLayout>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";
import { useForm, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  props: ["errors", "models"],
  components: {
    breadcrumb,
    GuestLayout,
    Link,
  },
  data() {
    return {};
  },
  methods: {
    submitD(item) {
      Inertia.delete(
        route("wishlist.destroy", {
          wishlist: item.id,
        }),
        {
          preserveScroll: true,
          onSuccess: (res) => {},
        }
      );
    },
  },
};
</script>
