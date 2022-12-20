<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
</script>

<template>
  <GuestLayout :title="$t('nav_menu.help.sipping_policy')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("nav_menu.help.sipping_policy") }}
      </h2>
    </template>
    <section
      class="breadcrumb-osahan pt-5 pb-5 bg-light position-relative text-center"
      style="
         background-image: url('https://himpies.com/wp-content/uploads/2021/09/himpies-banner-scaled.jpg');
      "
    >
      <h1 class="text-white">{{ $t("nav_menu.help.sipping_policy") }}</h1>
    </section>
    <section class="section pt-5 pb-5"></section>
  </GuestLayout>
</template>
