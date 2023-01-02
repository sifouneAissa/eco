<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ListingLayout from "@/Pages/Listing/Layout.vue";

defineProps({
  products: Array,
});
</script>

<template>
  <GuestLayout :title="$t('listing.page_title')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("listing.page_title") }}
      </h2>
    </template>

    <ListingLayout :title="$t('listing.page_title')" />
  </GuestLayout>
</template>
