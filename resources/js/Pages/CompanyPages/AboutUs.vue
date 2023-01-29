<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";
import logoarea from "@/Pages/Common/logoarea.vue";

const form = useForm({
  name: "",
  email: "",
  phone: "",
  message: "",
});

const submit = () => {
  // form.post(route(''));
};
export default {
  components: {
    Link,
    GuestLayout,
    breadcrumb,
    logoarea,
  },
};
</script>

<template>
  <GuestLayout :title="$t('nav_menu.help.about_us')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("nav_menu.help.about_us") }}
      </h2>
    </template>
    <breadcrumb :title="$t('nav_menu.help.about_us')" />
    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-80-- pb-80">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 align-self-center">
            <div class="about-us-info-wrap pt-30 pb-30">
              <h3>{{ $t("about_us.section1.title1") }}</h3>
              <h1>{{ $t("about_us.section1.title2") }}</h1>
              <p>
                {{ $t("about_us.section1.desc1") }}
              </p>

              <p>
                {{ $t("about_us.section1.desc2") }}
              </p>
              <div class="btn-wrapper">
                <Link
                  :href="route('blog.index')"
                  class="theme-btn-3 btn btn-effect-4 text-uppercase"
                  >{{ $t("about_us.section1.read") }}</Link
                >
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center">
            <div class="about-us-img-wrap about-img-right">
              <!-- <img src="/img/banner/6.png" alt="Banner Image" /> -->
              <img src="/img/banner/section1.jpg" alt="Banner Image" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ABOUT US AREA END -->
    <!-- OUR HISTORY AREA START -->
    <div class="ltn__our-history-area section-bg-1 pt-80 pb-80">
      <div class="container">
        <div class="ltn__our-history-inner ltn__our-history-inner-2">
          <div class="row">
            <div class="col-lg-12">
              <div class="tab-content">
                <div class="tab-pane fade active show" id="liton_tab_2_1">
                  <div class="ltn__product-tab-content-inner">
                    <div class="row">
                      <div class="col-lg-7 col-md-7 align-self-center">
                        <div class="about-us-info-wrap">
                          <h2>{{ $t("about_us.section2.title") }}</h2>
                          <p>
                            {{ $t("about_us.section2.desc") }}
                          </p>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-5 align-self-center">
                        <div class="about-us-img-wrap">
                          <!-- <img src="/img/banner/7.png" alt="Image" /> -->
                          <img src="/img/banner/section2.png" alt="Image" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- OUR HISTORY AREA END -->

    <logoarea />
  </GuestLayout>
</template>
