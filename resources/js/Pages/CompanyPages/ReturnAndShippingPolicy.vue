<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";
export default {
  components: {
    GuestLayout,
    breadcrumb,
  },
};
</script>

<template>
  <GuestLayout :title="$t('nav_menu.help.shipping_policy')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("nav_menu.help.shipping_policy") }}
      </h2>
    </template>
    <breadcrumb :title="$t('nav_menu.help.shipping_policy')" />
  </GuestLayout>
</template>
