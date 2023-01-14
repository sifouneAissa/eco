<script setup>
import CartMenu from "@/Pages/Checkout/CartMenu.vue";
import { Inertia } from "@inertiajs/inertia";
</script>
<template>
  <div>
    <!-- <div class="pb-2">
            <div class="bg-white rounded shadow-sm text-white mb-4 p-4 clearfix restaurant-detailed-earn-pts card-icon-overlap">
                <img class="img-fluid float-left mr-3" src="/img/earn-score-icon.png">
                <h6 class="pt-0 text-primary mb-1 font-weight-bold">OFFER</h6>
                <p class="mb-0">60% off on orders above $99 | Use coupon <span class="text-danger font-weight-bold">OSAHAN50</span></p>
                <div class="icon-overlap">
                    <i class="icofont-sale-discount"></i>
                </div>
            </div>
        </div> -->
    <CartMenu @Pay="Inertia.visit(route('checkout.show'))" />
  </div>
</template>
