<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
</script>

<template>
  <GuestLayout :title="$t('nav_menu.help.faq')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("nav_menu.help.faq") }}
      </h2>
    </template>
    <section
      class="breadcrumb-osahan pt-5 pb-5 bg-light position-relative text-center"
      style="
         background-image: url('https://himpies.com/wp-content/uploads/2021/09/himpies-banner-scaled.jpg');
      "
    >
      <h1 class="text-white">{{ $t("nav_menu.help.faq") }}</h1>
    </section>
    <section>
      <h2 class="text-center m-4">Frequently Asked Questions</h2>
      <div class="col-md-10 mx-auto bg-light p-5 rounded mb-4">
        <hr />
        <h3>Category one</h3>
        <hr />
        <section id="questions">
          <div class="">
            <a
              href="#"
              class="btn-link collapsed"
              data-toggle="collapse"
              data-target="#collapseOne"
              aria-expanded="false"
              aria-controls="collapseOne"
            >
              <h4 class="text-primary">
                Contact Us <i class="fas fa-angle-down float-right"></i>
              </h4>
            </a>
          </div>
          <hr />
          <div class="">
            <div
              id="collapseOne"
              class="collapse"
              aria-labelledby="headingOne"
              data-parent="#questions"
              style=""
            >
              <div class="pr-5 pl-5">
                <h6>
                  <a
                    href="#"
                    class="btn-link collapsed"
                    data-toggle="collapse"
                    data-target="#collapseTwo"
                    aria-expanded="false"
                    aria-controls="collapseTwo"
                  >
                    <i class="fas fa-angle-right"></i>
                    I reached out via email or social media but haven't received a
                    response in over 2 business days!
                  </a>
                </h6>
                <div
                  id="collapseTwo"
                  class="collapse pl-4 pr-4"
                  aria-labelledby="headingTwo"
                  style=""
                >
                  <p>
                    We're so sorry to hear this! Please make sure your message was sent to
                    hello@bitetoothpastebits.com. We do our best to get back to everyone
                    as soon as possible which usually means within 1 to 2 business days
                    (Monday to Friday, excluding holidays).
                  </p>
                </div>
              </div>
              <hr />
              <div class="pr-5 pl-5">
                <h6>
                  <a
                    href="#"
                    class="btn-link collapsed"
                    data-toggle="collapse"
                    data-target="#collapseThree"
                    aria-expanded="false"
                    aria-controls="collapseThree"
                  >
                    <i class="fas fa-angle-right"></i>
                    What are Bite's business hours?
                  </a>
                </h6>
                <div
                  id="collapseThree"
                  class="collapse pl-4 pr-4"
                  aria-labelledby="headingThree"
                  style=""
                >
                  <p>10am - 6pm PST, Monday - Friday (excluding holidays)</p>
                </div>
              </div>
              <hr />
            </div>
          </div>
        </section>
      </div>
    </section>
  </GuestLayout>
</template>
