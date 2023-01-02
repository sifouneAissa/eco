<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import CheckoutOption from "@/Pages/Checkout/CheckoutOption.vue";

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

    <CheckoutOption />
  </GuestLayout>
</template>
