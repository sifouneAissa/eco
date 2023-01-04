<script>
import { useForm } from "@inertiajs/inertia-vue3";
import Categories from "@/Pages/Listing/Categories.vue";
import ProductCard from "@/Pages/Listing/ProductCard.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref, onMounted } from "vue";

export default {
  components: {
    Categories,
    ProductCard,
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
    <section class="pt-5 pb-5 homepage-search-block position-relative">
      <div class="banner-overlay"></div>
      <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-md-8">
            <div class="homepage-search-title">
              <h1 class="mb-2 font-weight-normal">
                <span class="font-weight-bold">{{ $t("dashboard.title1") }}</span>
              </h1>
              <h5 class="mb-5 text-secondary font-weight-normal">
                {{ $t("dashboard.title2") }}
              </h5>
            </div>
            <div class="homepage-search-form">
              <form class="form-noborder">
                <div class="form-row">
                  <div class="col-lg-3 col-md-3 col-sm-12 form-group">
                    <div class="location-dropdown">
                      <i class="icofont-location-arrow"></i>
                      <select
                        v-model="form.query.category"
                        class="custom-select form-control-lg"
                      >
                        <option disabled>{{ $t("dashboard.quick_search") }}</option>
                        <option
                          v-for="category in $page.props.categories"
                          :key="category.id"
                          :value="category.name"
                        >
                          {{ category.name }}
                        </option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-7 col-md-7 col-sm-12 form-group">
                    <input
                      v-model="form.query.search"
                      type="text"
                      :placeholder="$t('dashboard.search_by_name')"
                      class="form-control form-control-lg"
                    />
                    <!--                                    <a class="locate-me" href="#"><i class="icofont-ui-pointer"></i> Locate Me</a>-->
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-12 form-group">
                    <a
                      @click="submit"
                      class="btn btn-primary btn-block btn-lg btn-gradient"
                      >{{ $t("dashboard.search") }}</a
                    >
                    <!--<button type="submit" class="btn btn-primary btn-block btn-lg btn-gradient">Search</button>-->
                  </div>
                </div>
              </form>
            </div>
            <h6 class="mt-4 text-shadow font-weight-normal">
              {{ $t("dashboard.categories") }}
            </h6>
            <div class="owl-carousel owl-carousel-category owl-theme">
              <Categories />
              <!--                        <div class="item">-->
              <!--                            <div class="osahan-category-item">-->
              <!--                                <a href="#">-->
              <!--                                    <img class="img-fluid" src="img/list/1.png" alt="">-->
              <!--                                    <h6>American</h6>-->
              <!--                                    <p>156</p>-->
              <!--                                </a>-->
              <!--                            </div>-->
              <!--                        </div>-->
              <!--                        <div class="item">-->
              <!--                            <div class="osahan-category-item">-->
              <!--                                <a href="#">-->
              <!--                                    <img class="img-fluid" src="img/list/2.png" alt="">-->
              <!--                                    <h6>Pizza</h6>-->
              <!--                                    <p>120</p>-->
              <!--                                </a>-->
              <!--                            </div>-->
              <!--                        </div>-->
            </div>
          </div>
          <div class="col-md-4">
            <div class="osahan-slider pl-4 pt-3">
              <div id="myhome" class="owl-carousel homepage-ad owl-theme">
                <div class="item">
                  <a href="listing.html"
                    ><img class="img-fluid rounded" src="img/slider.png"
                  /></a>
                </div>
                <div class="item">
                  <a href="listing.html"
                    ><img class="img-fluid rounded" src="img/slider1.png"
                  /></a>
                </div>
                <div class="item">
                  <a href="listing.html"
                    ><img class="img-fluid rounded" src="img/slider.png"
                  /></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section pt-5 pb-5 products-section">
      <div class="container">
        <div class="section-header text-center">
          <h2>{{ $t("dashboard.most_requested") }}</h2>
          <p>{{ $t("dashboard.title2") }}</p>
          <span class="line"></span>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div
              class="owl-carousel owl-theme owl-carousel-four offers-interested-carousel mb-3"
            >
              <ProductCard
                v-for="model in $page.props.products"
                :key="model.id"
                :model="model"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- <section class="section pt-5 pb-5 bg-white becomemember-section border-bottom">
        <div class="container">
            <div class="section-header text-center white-text">
                <h2>Become a Member</h2>
                <p>Lorem Ipsum is simply dummy text of</p>
                <span class="line"></span>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <a :href="route('register')" class="btn btn-success btn-lg">
                        Create an Account <i class="fa fa-chevron-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section pt-5 pb-5 text-center bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="m-0">Operate food store or restaurants? <a href="login.html">Work With Us</a></h5>
                </div>
            </div>
        </div>
    </section> -->
    <section class="footer pt-5 pb-5">
      <div class="container">
        <div class="row">
          <!-- <div class="col-md-4 col-12 col-sm-12">
            <h6 class="mb-3">Subscribe to our Newsletter</h6>
            <form class="newsletter-form mb-1">
              <div class="input-group">
                <input
                  type="text"
                  placeholder="Please enter your email"
                  class="form-control"
                />
                <div class="input-group-append">
                  <button type="button" class="btn btn-primary">Subscribe</button>
                </div>
              </div>
            </form>
            <p>
              <a class="text-info" href="register.html">Register now</a> to get updates on
              <a href="offers.html">Offers and Coupons</a>
            </p>
            <div class="app">
              <p class="mb-2">DOWNLOAD APP</p>
              <a href="#">
                <img class="img-fluid" src="img/google.png" />
              </a>
              <a href="#">
                <img class="img-fluid" src="img/apple.png" />
              </a>
            </div>
          </div> -->
          <div class="col-md-1 col-sm-6 mobile-none"></div>
          <div class="col-md-2 col-6 col-sm-4">
            <h6 class="mb-3">About Us</h6>
            <ul>
              <li>
                <a :href="route('contact-us')">{{ $t("nav_menu.help.contact_us") }} </a>
              </li>
              <li>
                <a :href="route('about-us')">{{ $t("nav_menu.help.about_us") }} </a>
              </li>
              <li>
                <a :href="route('faq')">{{ $t("nav_menu.help.faq") }} </a>
              </li>
              <li>
                <a :href="route('privacy-policy')"
                  >{{ $t("nav_menu.help.privacy_policy") }}
                </a>
              </li>
              <li>
                <a :href="route('shipping-policy')"
                  >{{ $t("nav_menu.help.shipping_policy") }}
                </a>
              </li>
              <li>
                <a :href="route('terms-conditions')"
                  >{{ $t("nav_menu.help.terms_conditions") }}
                </a>
              </li>
            </ul>
          </div>
          <!-- <div class="col-md-2 col-6 col-sm-4">
            <h6 class="mb-3">For Foodies</h6>
            <ul>
              <li><a href="#">Community</a></li>
              <li><a href="#">Developers</a></li>
              <li><a href="#">Blogger Help</a></li>
              <li><a href="#">Verified Users</a></li>
              <li><a href="#">Code of Conduct</a></li>
            </ul>
          </div> -->
          <!-- <div class="col-md-2 m-none col-4 col-sm-4">
            <h6 class="mb-3">For Restaurants</h6>
            <ul>
              <li><a href="#">Advertise</a></li>
              <li><a href="#">Add a Restaurant</a></li>
              <li><a href="#">Claim your Listing</a></li>
              <li><a href="#">For Businesses</a></li>
              <li><a href="#">Owner Guidelines</a></li>
            </ul>
          </div> -->
        </div>
      </div>
    </section>
  </div>
</template>
