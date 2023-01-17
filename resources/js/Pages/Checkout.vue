<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import CheckoutOption from "@/Pages/Checkout/CheckoutOption.vue";
import breadcrumb from '@/Pages/Common/breadcrumb.vue';

// defineProps({
//     addresses: Array,
// });
</script>

<template>
  <GuestLayout :title="$t('listing.checkout')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("listing.checkout") }}
      </h2>
    </template>


      <!-- BREADCRUMB AREA START -->
      <breadcrumb  :title="$t('listing.checkout')" />
      <!-- BREADCRUMB AREA END -->

    <CheckoutOption />
  </GuestLayout>
</template>
