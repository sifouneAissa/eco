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
    <div
      class="call-to-action-area call-to-action-1 bg-image section-bg-2 hero-img"
      data-bg="/img/bg/3.png"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="call-to-action-inner beard-trimmer text-center">
              <!--              <h5 class="text-uppercase">{{ $t("dashboard.title1") }}</h5>-->
              <h1 class="text-uppercase title-size title-margin">
                {{ $page.props.home_page_header_1 }}
              </h1>
              <!-- <h1 class="text-uppercase title-size">
                {{ $page.props.home_page_sub_header_1 }}
              </h1> -->
              <!--              <h1>{{ $t("dashboard.title2") }}</h1>-->
              <h2 class="title-margin">{{ $page.props.home_page_header_2 }}</h2>
              <div class="btn-wrapper">
                <Link
                  class="theme-btn-1 btn btn-effect-1 text-uppercase"
                  :href="route('listing')"
                  >{{ $t("dashboard.shop_now") }}</Link
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- SLIDER AREA END -->

    <!-- ABOUT US AREA START -->
    <div class="ltn__about-us-area pt-80 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 align-self-center">
            <div class="about-us-info-wrap pt-30 pb-30">
              <!--              <h3>{{ $t("dashboard.section1.title1") }}</h3>-->
              <h3>{{ $page.props.home_page_section_1_sub_header_1 }}</h3>
              <!--              <h1>{{ $t("dashboard.section1.title2") }}</h1>-->
              <h1>{{ $page.props.home_page_section_1_header_1 }}</h1>
              <p>
                <!--                {{ $t("dashboard.section1.desc1") }}-->
                {{ $page.props.home_page_section_1_description_1 }}
              </p>

              <!-- <p>
                  {{ $page.props.home_page_section_1_description_2 }}
              </p> -->
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

    <!-- ABOUT US AREA START -->
    <div class="ltn__banner-area section-bg-1">
      <div class="container">
        <div class="row">
          <div  v-if="$page.props.cLeft" class="col-lg-6 col-md-6 align-self-center">
            <div
              :class="
                $page.props.isRtl
                  ? 'banner-info-wrap beard-growing-kit text-right bg-image'
                  : 'banner-info-wrap beard-growing-kit text-left bg-image'
              "
              :data-bg="$page.props.cLeft.fimage"
            >
<!--              <h5>{{ $t("dashboard.section2.groom")  }}</h5>-->
              <h5>{{ $page.props.cLeft.lname  }}</h5>
              <h1>
                <!--                {{ $t("dashboard.section2.title1") }}-->
                {{ $page.props.home_page_section_2_header_left }}
                <br />
                <!--                {{ $t("dashboard.section2.title2") }}-->
                {{ $page.props.home_page_section_2_header_2_left }}
              </h1>
              <div class="btn-wrapper">
<!--                <Link :href="route('listing')" class="theme-btn-1 btn btn-effect-1 text-uppercase">{{ $t("dashboard.section2.try") }}</Link>-->
                <Link :href="route('listing') + '?query=' + $page.props.cLeft.name" class="theme-btn-1 btn btn-effect-1 text-uppercase">{{ $t("dashboard.section2.try")+ ' '+$page.props.cLeft.lname }}</Link>
              </div>
            </div>
          </div>
          <div v-if="$page.props.cRight" class="col-lg-6 col-md-6 align-self-center">
            <div
              :class="
                $page.props.isRtl
                  ? 'banner-info-wrap beard-growing-kit text-left bg-image'
                  : 'banner-info-wrap beard-growing-kit text-right bg-image'
              "
              :data-bg="$page.props.cRight.fimage"
            >
<!--              <h5>{{ $t("dashboard.section2.groom") }}</h5>-->
              <h5>{{ $page.props.cRight.lname }}</h5>
              <h1>
                <!--                {{ $t("dashboard.section2.title3") }} -->

                {{ $page.props.home_page_section_2_header_right }}
                <br />
                {{ $page.props.home_page_section_2_header_2_right }}
                <!--                {{ $t("dashboard.section2.title4") }}-->
              </h1>
              <div class="btn-wrapper">
                <Link
                  :href="route('listing')+'?query='+$page.props.cRight.name"
                  class="theme-btn-1 btn btn-effect-1 text-uppercase"
                  >{{ $t("dashboard.section2.try") + ' '+ $page.props.cRight.lname }}</Link
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
      class="call-to-action-area call-to-action-1 bg-image section-bg-2 pt-80 pb-80 mb-40"
      data-bg="/img/bg/3.png"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="call-to-action-inner beard-trimmer text-center">
              <!--              <h1 class="text-uppercase">{{ $t("dashboard.section4.title1") }}</h1>-->
              <h1 class="text-uppercase">{{ $page.props.home_page_header_3 }}</h1>
              <!--                <h5 class="text-uppercase">{{ $page.props.home_page_sub_header_1 }}</h5>-->
              <!--              <h5>{{ $t("dashboard.section4.title2") }}</h5>-->
              <h5>{{ $page.props.home_page_sub_header_3 }}</h5>
              <div class="btn-wrapper">
                <Link
                  class="theme-btn-1 btn btn-effect-1 text-uppercase"
                  :href="route('listing')"
                  >{{ $t("dashboard.section4.shop_now") }}</Link
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
    <div class="ltn__testimonial-area section-bg-1--- pb-40">
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
    <div class="ltn__banner-area pb-40 d-none">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-sm-6">
            <div class="ltn__banner-item">
              <div class="ltn__banner-img">
                <Link :href="route('listing')"
                  ><img src="img/banner/3.jpg" alt="Image"
                /></Link>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <div class="ltn__banner-item">
              <div class="ltn__banner-img">
                <Link :href="route('listing')"
                  ><img src="img/banner/4.jpg" alt="Image"
                /></Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- BANNER AREA END -->

    <!-- VIDEO AREA START -->
    <div class="ltn__video-area section-bg-1 pt-40 pb-40 d-none">
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
      class="ltn__newsletter-area section-bg-1 bg-overlay-white-30 bg-image pt-40 pb-40"
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
<style scoped>
.style_text {
  color: rgb(255, 255, 255);
  font-family: "Montserrat";
}
@media only screen and (min-width: 800px) {
  .hero-img {
    padding-bottom: 250px;
    padding-top: 200px;
  }
  .title-size {
    font-size: 48px;
  }
  .title-margin {
    margin-bottom: 20px;
  }
}
@media only screen and (max-width: 600px) {
  .hero-img {
    padding-bottom: 100px;
    padding-top: 100px;
  }
  .title-size {
    font-size: 30px;
  }
  .title-margin {
    margin-bottom: 20px;
  }
}
</style>
