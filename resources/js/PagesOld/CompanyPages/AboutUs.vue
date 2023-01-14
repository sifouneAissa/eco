<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
  name: "",
  email: "",
  phone: "",
  message: "",
});

const submit = () => {
  // form.post(route(''));
};
</script>

<template>
  <GuestLayout :title="$t('nav_menu.help.about_us')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("nav_menu.help.about_us") }}
      </h2>
    </template>
    <section
      class="breadcrumb-osahan pt-5 pb-5 bg-light position-relative text-center"
      style="
         background-image: url('https://himpies.com/wp-content/uploads/2021/09/himpies-banner-scaled.jpg');
      "
    >
      <h1 class="text-white">{{ $t("nav_menu.help.about_us") }}</h1>
    </section>
    <section class="section pt-5 pb-5">
      <div class="container">
        <div class="row">
          <h1 class="text-center">
            In Himpies we bring the ancient wisdom and newest technology together to
            improve our life.
          </h1>
        </div>
      </div>
    </section>
    <section class="section pt-5 pb-5">
      <div class="container">
        <div class="row mb-4">
          <h4 class="text-center">
            Around the world, older generations used to heal there bodies using natural
            remedies, and hemp is one of this powerful plant, it could heal our body and
            mind at the same time. At Himpies we believe hemp can give the world more than
            they know, and this is what we are trying to show.
          </h4>
        </div>
        <div class="row justify-content-center mb-4">
          <h3 class="text-center">WE CAN COUNT ON NATURAL.</h3>
        </div>
        <div class="row justify-content-center mb-4">
          <button type="button" class="btn btn-primary">Read More</button>
        </div>
      </div>
    </section>
    <section class="section pt-5 pb-5 bg-white becomemember-section border-bottom">
      <div class="container">
        <div class="section-header text-center white-text">
          <h2>Our Company</h2>
          <p>
            Himpies is a hemp brand powered by SESHATA. Based in United Arab Emirates. We
            bring the best quality of HEMP products over the world to you. 100% Natural
            Vegan THC free
          </p>
        </div>
        <div class="row">
          <div class="col-sm-12 text-center"></div>
        </div>
      </div>
    </section>
  </GuestLayout>
</template>
