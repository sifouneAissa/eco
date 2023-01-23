<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";

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
    <breadcrumb :title="$t('nav_menu.help.contact_us')" />
    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-120-- pb-120">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 align-self-center">
            <div class="about-us-info-wrap pt-30 pb-30">
              <h3>Provide the best</h3>
              <h1>Beard Oil For You</h1>
              <p>
                We provide the best Beard oil all over the world. We are the worldd best
                store for Beard Oil. You can buy our product without any hegitation
                because we always consus about our product quality and always maintain it
                properly so your can trust and this is our main goal we belive that...
              </p>

              <p>
                Some of our customer say’s that they trust us and buy our product without
                any hagitation because they belive us and always happy
              </p>
              <div class="btn-wrapper">
                <Link
                  :href="route('listing')"
                  class="theme-btn-3 btn btn-effect-4 text-uppercase"
                  >{{ $t("dashboard.section1.view_more") }}</Link
                >
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center">
            <div class="about-us-img-wrap about-img-right">
              <img src="/img/banner/6.png" alt="Banner Image" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ABOUT US AREA END -->
    <!-- VIDEO AREA START -->
    <div class="ltn__video-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ltn__video-img">
              <img src="/img/bg/12.jpg" alt="video popup bg image" />
              <a
                class="ltn__video-icon-2 ltn__video-icon-2-border"
                href="https://www.youtube.com/embed/qu5PxhEUMfU?autoplay=1&showinfo=0"
                data-rel="lightcase:myCollection"
              >
                <i class="fa fa-play"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- VIDEO AREA END -->
    <!-- OUR HISTORY AREA START -->
    <div class="ltn__our-history-area section-bg-1 mt-120 pt-120 pb-120">
      <div class="container">
        <div class="ltn__our-history-inner ltn__our-history-inner-2">
          <div class="row">
            <div class="col-lg-2 order-lg-2 align-self-center">
              <div class="ltn__tab-menu text-uppercase">
                <div class="nav">
                  <a class="active show" data-toggle="tab" href="#liton_tab_2_1"
                    ><span class="d-none d-lg-block">-</span> 2020</a
                  >
                  <a data-toggle="tab" href="#liton_tab_2_2"
                    ><span class="d-none d-lg-block">-</span> 2019</a
                  >
                  <a data-toggle="tab" href="#liton_tab_2_3"
                    ><span class="d-none d-lg-block">-</span> 2018</a
                  >
                  <a data-toggle="tab" href="#liton_tab_2_4"
                    ><span class="d-none d-lg-block">-</span> 2017</a
                  >
                  <a data-toggle="tab" href="#liton_tab_2_5"
                    ><span class="d-none d-lg-block">-</span> 2016</a
                  >
                </div>
              </div>
            </div>
            <div class="col-lg-10">
              <div class="tab-content">
                <div class="tab-pane fade active show" id="liton_tab_2_1">
                  <div class="ltn__product-tab-content-inner">
                    <div class="row">
                      <div class="col-lg-7 col-md-7 align-self-center">
                        <div class="about-us-info-wrap">
                          <h2>2020</h2>
                          <p>
                            We provide the best Beard oil all over the world. We are the
                            worldd best store for Beard Oil. You can buy our product
                            without any hegitation because we always consus about our
                            product quality and always maintain it properly so your can
                            trust and this is our main goal we belive that... Some of our
                            customer say’s that they trust us and buy our product without
                            any hagitation because they belive us and always happy
                          </p>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-5 align-self-center">
                        <div class="about-us-img-wrap">
                          <img src="/img/banner/7.png" alt="Image" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="liton_tab_2_2">
                  <div class="ltn__product-tab-content-inner">
                    <div class="row">
                      <div class="col-lg-7 col-md-7 align-self-center">
                        <div class="about-us-info-wrap">
                          <h2>2019</h2>
                          <p>
                            We provide the best Beard oil all over the world. We are the
                            worldd best store for Beard Oil. You can buy our product
                            without any hegitation because we always consus about our
                            product quality and always maintain it properly so your can
                            trust and this is our main goal we belive that... Some of our
                            customer say’s that they trust us and buy our product without
                            any hagitation because they belive us and always happy
                          </p>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-5 align-self-center">
                        <div class="about-us-img-wrap">
                          <img src="/img/banner/6.png" alt="Image" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="liton_tab_2_3">
                  <div class="ltn__product-tab-content-inner">
                    <div class="row">
                      <div class="col-lg-7 col-md-7 align-self-center">
                        <div class="about-us-info-wrap">
                          <h2>2018</h2>
                          <p>
                            We provide the best Beard oil all over the world. We are the
                            worldd best store for Beard Oil. You can buy our product
                            without any hegitation because we always consus about our
                            product quality and always maintain it properly so your can
                            trust and this is our main goal we belive that... Some of our
                            customer say’s that they trust us and buy our product without
                            any hagitation because they belive us and always happy
                          </p>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-5 align-self-center">
                        <div class="about-us-img-wrap">
                          <img src="/img/banner/5.png" alt="Image" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="liton_tab_2_4">
                  <div class="ltn__product-tab-content-inner">
                    <div class="row">
                      <div class="col-lg-7 col-md-7 align-self-center">
                        <div class="about-us-info-wrap">
                          <h2>2017</h2>
                          <p>
                            We provide the best Beard oil all over the world. We are the
                            worldd best store for Beard Oil. You can buy our product
                            without any hegitation because we always consus about our
                            product quality and always maintain it properly so your can
                            trust and this is our main goal we belive that... Some of our
                            customer say’s that they trust us and buy our product without
                            any hagitation because they belive us and always happy
                          </p>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-5 align-self-center">
                        <div class="about-us-img-wrap">
                          <img src="/img/banner/7.png" alt="Image" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="liton_tab_2_5">
                  <div class="ltn__product-tab-content-inner">
                    <div class="row">
                      <div class="col-lg-7 col-md-7 align-self-center">
                        <div class="about-us-info-wrap">
                          <h2>2016</h2>
                          <p>
                            We provide the best Beard oil all over the world. We are the
                            worldd best store for Beard Oil. You can buy our product
                            without any hegitation because we always consus about our
                            product quality and always maintain it properly so your can
                            trust and this is our main goal we belive that... Some of our
                            customer say’s that they trust us and buy our product without
                            any hagitation because they belive us and always happy
                          </p>
                        </div>
                      </div>
                      <div class="col-lg-5 col-md-5 align-self-center">
                        <div class="about-us-img-wrap">
                          <img src="/img/banner/6.png" alt="Image" />
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
