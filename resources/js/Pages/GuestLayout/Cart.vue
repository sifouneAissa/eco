<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/inertia-vue3";

const submitD = function (item) {
  Inertia.delete(
    route("cartitem.destroy", {
      id: item.id,
    }),
    {
      onSuccess: (res) => {},
    }
  );
};
</script>
<template>
  <div>
    <a
      class="nav-link dropdown-toggle"
      href="#"
      role="button"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
    >
      <i class="fas fa-shopping-basket"></i> {{ $t("listing.cart") }}
      <span class="badge badge-success">{{
        $page.props.shopping_session ? $page.props.shopping_session.cart_items.length : 0
      }}</span>
    </a>
    <div
      v-if="$page.props.shopping_session"
      class="dropdown-menu dropdown-cart-top p-0 dropdown-menu-right shadow-sm border-0"
    >
      <div class="dropdown-cart-top-header p-4">
        <img class="img-fluid mr-3" alt="osahan" src="/img/checkout.png" />
        <h6 class="mb-0">{{ $page.props.shopping_session.names }}</h6>
        <!--                <p class="text-secondary mb-0">310 S Front St, Memphis, USA</p>-->
        <small
          ><Link :href="route('checkout.show')" class="text-primary font-weight-bold">{{
            $t("listing.full_menu")
          }}</Link></small
        >
      </div>
      <div class="dropdown-cart-top-body border-top p-4">
        <div v-for="item in $page.props.shopping_session.cart_items" :key="item.id">
          <p class="mb-2">
            <i @click="submitD(item)" class="icofont-delete text-danger food-item"></i>
            {{ item.product.name }} x {{ item.quantity }}
            <span class="float-right text-secondary"
              >{{ $page.props.currency_code }} {{ item.qprice }}</span
            >
          </p>
        </div>
        <!--                <p class="mb-2"><i class="icofont-ui-press text-success food-item"></i> Corn & Peas Salad x 1   <span class="float-right text-secondary">$209</span></p>-->
        <!--                <p class="mb-2"><i class="icofont-ui-press text-success food-item"></i> Veg Seekh Sub 6" (15 cm) x 1  <span class="float-right text-secondary">$133</span></p>-->
        <!--                <p class="mb-2"><i class="icofont-ui-press text-danger food-item"></i> Chicken Tikka Sub 12" (30 cm) x 1   <span class="float-right text-secondary">$314</span></p>-->
        <!--                <p class="mb-2"><i class="icofont-ui-press text-danger food-item"></i> Corn & Peas Salad x 1   <span class="float-right text-secondary">$209</span></p>-->
      </div>
      <div class="dropdown-cart-top-footer border-top p-4">
        <p class="mb-0 font-weight-bold text-secondary">
          {{ $t("listing.total") }}
          <span class="float-right text-dark"
            >{{ $page.props.currency_code }}
            {{ $page.props.shopping_session.citotal }}</span
          >
        </p>
        <!-- <small class="text-info">Extra charges may apply</small> -->
      </div>
      <div class="dropdown-cart-top-footer border-top p-2">
        <Link class="btn btn-success btn-block btn-lg" :href="route('checkout.show')">{{
          $t("listing.checkout")
        }}</Link>
      </div>
    </div>
    <div
      v-else
      class="dropdown-menu dropdown-cart-top p-0 dropdown-menu-right shadow-sm border-0"
    >
      <!--            <div class="dropdown-cart-top-header p-4">-->
      <!--                <img class="img-fluid mr-3" alt="osahan" src="img/cart.jpg">-->
      <!--                <h6 class="mb-0">Gus's World Famous Chicken</h6>-->
      <!--                <p class="text-secondary mb-0">310 S Front St, Memphis, USA</p>-->
      <!--                <small><a class="text-primary font-weight-bold" href="#">View Full Menu</a></small>-->
      <!--            </div>-->
      <!--            <div class="dropdown-cart-top-body border-top p-4">-->
      <!--                <p class="mb-2"><i class="icofont-ui-press text-danger food-item"></i> Chicken Tikka Sub 12" (30 cm) x 1   <span class="float-right text-secondary">$314</span></p>-->
      <!--                <p class="mb-2"><i class="icofont-ui-press text-success food-item"></i> Corn & Peas Salad x 1   <span class="float-right text-secondary">$209</span></p>-->
      <!--                <p class="mb-2"><i class="icofont-ui-press text-success food-item"></i> Veg Seekh Sub 6" (15 cm) x 1  <span class="float-right text-secondary">$133</span></p>-->
      <!--                <p class="mb-2"><i class="icofont-ui-press text-danger food-item"></i> Chicken Tikka Sub 12" (30 cm) x 1   <span class="float-right text-secondary">$314</span></p>-->
      <!--                <p class="mb-2"><i class="icofont-ui-press text-danger food-item"></i> Corn & Peas Salad x 1   <span class="float-right text-secondary">$209</span></p>-->
      <!--            </div>-->
      <div class="dropdown-cart-top-footer border-top p-4">
        <p class="mb-0 font-weight-bold text-secondary">
          {{ "listing.list_empty" }}
          <span class="float-right text-dark">{{ $page.props.currency_code }} 0</span>
        </p>
        <!--                <small class="text-info">Extra charges may apply</small>-->
      </div>
      <div class="dropdown-cart-top-footer border-top p-2">
        <Link class="btn btn-success btn-block btn-lg" :href="route('listing')">{{
          "listing.add_products"
        }}</Link>
      </div>
    </div>
  </div>
</template>
