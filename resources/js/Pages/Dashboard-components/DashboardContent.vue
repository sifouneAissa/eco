<script>
import { useForm } from "@inertiajs/inertia-vue3";
import Categories from "@/Pages/Listing/Categories.vue";
import ProductCard from "@/Pages/Listing/ProductCard.vue";
import Blogs from "@/Pages/Dashboard-components/Blogs.vue";
import Products from "@/Pages/Dashboard-components/Products.vue";
import DashCat from "@/Pages/Dashboard-components/DashCat.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref, onMounted } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import logoarea from "@/Pages/Common/logoarea.vue";

export default {
  components: {
    Categories,
    ProductCard,
    DashCat,
    Blogs,
    Products,
    Link,
    logoarea,
  },
  created() {},
  data() {
    return {
      form: useForm({
        query: {
          category: "",
          search: "",
        },
      }),
    };
  },
  methods: {
    submit: function () {
      this.form.get(route("listing"));
    },
  },
};
</script>

<template>
  <div>
    <!-- SLIDER AREA START (slider-1) -->
    <!-- <div class="ltn__slider-area ltn__slider-6 mb-120">
      <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1"> -->
    <!-- ltn__slide-item -->
    <!-- <div
          class="ltn__slide-item section-bg-1"
          style=" background-image: url('/img/slider/11.png')"
        >
          <div class="ltn__slide-item-inner">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 col-md-7 col-sm-7 align-self-center">
                  <div class="slide-item-info">
                    <div class="slide-item-info-inner ltn__slide-animation">
                      <h4 class="slide-sub-title animated">
                        {{ $t("dashboard.title1") }}
                      </h4>
                      <h1 class="slide-title animated">
                        {{ $t("dashboard.title2") }} <br />
                        {{ $t("dashboard.title3") }}
                      </h1>
                      <div class="slide-brief animated">
                        <p class="">
                          {{ $t("dashboard.desc1") }}
                        </p>
                      </div>
                      <div class="btn-wrapper animated">
                        <Link
                          :href="route('listing')"
                          class="theme-btn-1 btn btn-effect-1 text-uppercase"
                          >{{ $t("dashboard.shop_now") }}</Link
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-5 align-self-center">
                  <div>
                    <a :href="route('listing')"
                      ><img src="/img/slider/11.png" alt="Image"
                    /></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
    <!-- ltn__slide-item -->
    <!-- <div
          class="ltn__slide-item section-bg-1"
          style=" background-image: url('/img/slider/1-1.png')"
        >
          <div class="ltn__slide-item-inner">
            <div class="container">
              <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-5 align-self-center">
                  <div>
                    <a :href="route('listing')"
                      ><img src="/img/slider/1-1.png" alt="Image"
                    /></a>
                  </div>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-7 align-self-center">
                  <div class="slide-item-info">
                    <div class="slide-item-info-inner ltn__slide-animation">
                      <h4 class="slide-sub-title animated style_text">
                        {{ $t("dashboard.title1") }}
                      </h4>
                      <h1 class="slide-title animated style_text">
                        {{ $t("dashboard.title2") }} <br />
                        {{ $t("dashboard.title3") }}
                      </h1>
                      <div class="slide-brief animated">
                        <p class="style_text">
                          {{ $t("dashboard.desc1") }}
                        </p>
                      </div>
                      <div class="btn-wrapper animated">
                        <Link
                          :href="route('listing')"
                          class="theme-btn-1 btn btn-effect-1 text-uppercase"
                          >{{ $t("dashboard.shop_now") }}</Link
                        >
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
    <!-- </div>
    </div> -->
    <!-- SLIDER AREA END -->

    <!-- SLIDER AREA START (slider-1) -->
    <div class="ltn__slider-area ltn__slider-6 mb-120---">
      <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
        <!-- ltn__slide-item -->
        <div
          class="ltn__slide-item--- ltn__slide-item-9 section-bg-1 bg-image"
          data-bg="/img/slider/11.png"
        >
          <div class="ltn__slide-item-inner right-align">
            <div
              class="slide-item-info bg-overlay-theme-black-90 text-color-white text-center"
            >
              <div class="slide-item-info-inner ltn__slide-animation">
                <h1 class="slide-title animated">
                  {{ $t("dashboard.title1") }}<br />
                  {{ $t("dashboard.title2") }}
                </h1>
                <h4 class="slide-sub-title text-uppercase animated">
                  {{ $t("dashboard.title3") }}
                </h4>
                <div class="btn-wrapper animated">
                  <Link
                    :href="route('listing')"
                    class="theme-btn-1 btn btn-effect-1 text-uppercase"
                    >{{ $t("dashboard.shop_now") }}</Link
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--  -->
      </div>
    </div>
    <!-- SLIDER AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pb-120 pt-110">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 align-self-center">
            <div class="about-us-info-wrap pt-30 pb-30">
              <h3>{{ $t("dashboard.section1.title1") }}</h3>
              <h1>{{ $t("dashboard.section1.title2") }}</h1>
              <p>
                {{ $t("dashboard.section1.desc1") }}
              </p>

              <p>
                {{ $t("dashboard.section1.desc2") }}
              </p>
              <div class="btn-wrapper">
                <a
                  :href="route('listing')"
                  class="theme-btn-3 btn btn-effect-4 text-uppercase"
                  >{{ $t("dashboard.section1.view_more") }}</a
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

    <!-- ABOUT US AREA START -->
    <div class="ltn__banner-area section-bg-1">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 align-self-center">
            <div
              :class="
                $page.props.isRtl
                  ? 'banner-info-wrap beard-growing-kit text-right bg-image'
                  : 'banner-info-wrap beard-growing-kit text-left bg-image'
              "
              data-bg="/img/banner/10.png"
            >
              <h5>{{ $t("dashboard.section2.groom") }}</h5>
              <h1>
                {{ $t("dashboard.section2.title1") }} <br />
                {{ $t("dashboard.section2.title2") }}
              </h1>
              <div class="btn-wrapper">
                <Link
                  :href="route('listing')"
                  class="theme-btn-1 btn btn-effect-1 text-uppercase"
                  >{{ $t("dashboard.section2.try") }}</Link
                >
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center">
            <div
              :class="
                $page.props.isRtl
                  ? 'banner-info-wrap beard-growing-kit text-left bg-image'
                  : 'banner-info-wrap beard-growing-kit text-right bg-image'
              "
              data-bg="/img/banner/11.png"
            >
              <h5>{{ $t("dashboard.section2.groom") }}</h5>
              <h1>
                {{ $t("dashboard.section2.title3") }} <br />
                {{ $t("dashboard.section2.title4") }}
              </h1>
              <div class="btn-wrapper">
                <Link
                  :href="route('listing')"
                  class="theme-btn-1 btn btn-effect-1 text-uppercase"
                  >{{ $t("dashboard.section2.try") }}</Link
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- ABOUT US AREA END -->
    <Products />
    <!-- CALL TO ACTION START (call-to-action-1) -->
    <div
      class="call-to-action-area call-to-action-1 bg-image section-bg-2 pt-220 pb-220 mb-110"
      data-bg="/img/bg/3.png"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="call-to-action-inner beard-trimmer text-center">
              <h5 class="text-uppercase">{{ $t("dashboard.section4.title1") }}</h5>
              <h1>{{ $t("dashboard.section4.title2") }}</h1>
              <div class="btn-wrapper">
                <Link
                  class="theme-btn-1 btn btn-effect-1 text-uppercase"
                  :href="route('listing')"
                  >{{ $t("dashboard.section1.view_more") }}</Link
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- CALL TO ACTION END -->

    <DashCat v-if="$page.props.dcat" />

    <!-- TESTIMONIAL AREA START -->
    <div class="ltn__testimonial-area section-bg-1--- pb-70">
      <div class="container">
        <div class="row d-none">
          <div class="col-lg-12">
            <div class="section-title-area text-center">
              <h1 class="section-title">Testimonial</h1>
              <p>There are many variations of passages of Lorem Ipsum available.</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10 offset-lg-1 white-bg">
            <div
              class="row ltn__testimonial-slider-active slick-arrow-1 slick-arrow-1-inner"
            >
              <div class="col-lg-12">
                <div class="ltn__testimonial-item ltn__testimonial-item-6 text-center">
                  <div class="ltn__testimoni-img">
                    <i class="icon-right-quote"></i>
                  </div>
                  <div class="ltn__testimonial-info">
                    <p>"{{ $t("dashboard.section5.desc") }}"</p>
                    <h4>__ {{ $t("blog.by") }} Jacob William __</h4>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="ltn__testimonial-item ltn__testimonial-item-6 text-center">
                  <div class="ltn__testimoni-img">
                    <i class="icon-right-quote"></i>
                  </div>
                  <div class="ltn__testimonial-info">
                    <p>"{{ $t("dashboard.section5.desc") }}"</p>
                    <h4>__ {{ $t("blog.by") }} Ethan James __</h4>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="ltn__testimonial-item ltn__testimonial-item-6 text-center">
                  <div class="ltn__testimoni-img">
                    <i class="icon-right-quote"></i>
                  </div>
                  <div class="ltn__testimonial-info">
                    <p>"{{ $t("dashboard.section5.desc") }}"</p>
                    <h4>__ {{ $t("blog.by") }} Liam Mason __</h4>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="ltn__testimonial-item ltn__testimonial-item-6 text-center">
                  <div class="ltn__testimoni-img">
                    <i class="icon-right-quote"></i>
                  </div>
                  <div class="ltn__testimonial-info">
                    <p>"{{ $t("dashboard.section5.desc") }}"</p>
                    <h4>__ {{ $t("blog.by") }} Noah Alexander __</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- TESTIMONIAL AREA END -->

    <!-- BANNER AREA START -->
    <div class="ltn__banner-area pb-90 d-none">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-sm-6">
            <div class="ltn__banner-item">
              <div class="ltn__banner-img">
                <a :href="route('listing')"><img src="img/banner/3.jpg" alt="Image" /></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="ltn__banner-item">
              <div class="ltn__banner-img">
                <a :href="route('listing')"><img src="img/banner/4.jpg" alt="Image" /></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- BANNER AREA END -->

    <!-- VIDEO AREA START -->
    <div class="ltn__video-area section-bg-1 pt-120 pb-120 d-none">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ltn__video-img">
              <img src="img/bg/8.jpg" alt="video popup bg image" />
              <a
                class="ltn__video-icon-2 ltn__video-icon-2-border"
                href="https://www.youtube.com/embed/X7R-q9rsrtU?autoplay=1&showinfo=0"
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

    <!-- NEWSLETTER AREA START -->
    <div
      class="ltn__newsletter-area section-bg-1 bg-overlay-white-30 bg-image pt-110 pb-90"
      data-bg="/img/bg/8.jpg"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="ltn__newsletter-inner text-center">
              <h2>{{ $t("dashboard.section6.title") }}</h2>
              <p>
                {{ $t("dashboard.section6.desc1") }}
                <br />
                {{ $t("dashboard.section6.desc2") }}
              </p>
              <form action="#" class="ltn__form-box">
                <input type="email" name="email" :placeholder="$t('contact_us.email')" />
                <div class="btn-wrapper">
                  <button
                    class="theme-btn-1 btn btn-effect-1 text-uppercase"
                    type="submit"
                  >
                    {{ $t("dashboard.section6.subscribe") }}
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- NEWSLETTER AREA END -->

    <logoarea />
  </div>
</template>
<style scoped></style>
<style scoped>
.style_text {
  color: rgb(255, 255, 255);
  font-family: "Montserrat";
}
</style>
