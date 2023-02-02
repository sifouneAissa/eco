<script>
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";
import CartMenu from "@/Pages/Checkout/CartMenu.vue";
import QuickViewModal from "@/Pages/Modals/QuickViewModal.vue";
import AddToWishListModel from "@/Pages/Modals/AddToWishListModel.vue";
import CheckoutModal from "@/Pages/Modals/CheckoutModal.vue";
import AddToCartModal from "@/Pages/Modals/AddToCartModal.vue";

export default {
  components: {
    Link,
    Head,
    CartMenu,
    QuickViewModal,
    AddToCartModal,
    AddToWishListModel,
    CheckoutModal,
  },

  mounted() {
    let app = this;
    // clear interval
    clearInterval(window.idleIntervalTimer);

    if (this.$page.component === "Listing") {
      clearInterval(window.idleIntervalTimer);
      window.idleIntervalTimer = setInterval(function () {
        Inertia.reload({
          only: ["products"],
          preserveScroll: true,
          // preserveState : true
        });
      }, 200000);
    } else if (this.$page.component === "Blogs") {
      window.idleIntervalTimer = setInterval(function () {
        Inertia.reload({
          only: ["blogs"],
          preserveScroll: true,
        });
      }, 200000);
    }

    $("#script1").remove();
    $("#script2").remove();

    $(document).ready(function () {
      if (!app.$page.props.botS)
        window.setTimeout(function () {
          if (botmanChatWidget) {
            botmanChatWidget?.sayAsBot("Hi");
            window.setTimeout(function () {
              botmanChatWidget.whisper("xxxxxxxxxxxxxxxxx");
            }, 2000);
          }
        }, 10000);

      $("#botmanWidgetRoot").css("float", "right");

      if (app.$page.props.isRtl) {
        // for lazy importation
        let script1 = document.createElement("script");
        script1.src = "/assets/rtl/js/plugins.js";
        script1.defer = true;
        script1.id = "script1";
        // script1.async = false;
        document.body.append(script1); // (*)
        //
        // for lazy importation
        let script2 = document.createElement("script");
        script2.src = "/assets/rtl/js/main.js";
        script2.defer = true;
        script2.id = "script2";
        document.body.append(script2); // (*)
      } else {
        // for lazy importation
        let script1 = document.createElement("script");
        script1.src = "/assets/ltr/js/plugins.js";
        // script1.defer = true;
        script1.async = false;
        script1.id = "script1";
        document.body.append(script1); // (*)

        // for lazy importation
        let script2 = document.createElement("script");
        script2.src = "/assets/ltr/js/main.js";
        // script2.defer = true;
        script2.id = "script2";
        script2.async = true;
        document.body.append(script2); // (*)

        // $("#scrollUp").css("z-index", "2147483637");

        $("#botmanWidgetRoot").click(function () {
          if (!app.isScroll) $("#scrollUp").css("display", "none");
          else $("#scrollUp").css("display", "block");
          app.isScroll = !app.isScroll;
        });
      }
    });

    window.onerror = function (error) {
      // error about tooltip
      if (error.includes("tooltip") || error.includes("WOW")) {
        Inertia.visit(app.$page.url, {
          // preserveState : true,
          preserveScroll: true,
        });
      }
    };
  },
  data() {
    return {
      submited: false,
      order_id: "",
      isScroll: false,
    };
  },
  computed: {
    vOrder: function () {
      return this.order_id.match(/^\d+$/);
    },
  },
  methods: {
    trackOrder: function () {
      this.submited = true;
      if (this.vOrder) Inertia.get(this.route("trackOrder", { id: this.order_id }));
    },
    setLocale: function (lang) {
      Inertia.post(
        route("setLocale"),
        { locale: lang },
        {
          onSuccess: () => window.location.reload(),
        }
      );
    },
    logout: function () {
      Inertia.post(
        route("logout"),
        {},
        {
          onSuccess: () => window.location.reload(),
        }
      );
    },
    setCurrency: function (currency) {
      Inertia.post(
        route("setCurrency"),
        { currency: currency },
        {
          onSuccess: () => window.location.reload(),
        }
      );
    },
  },
  props: ["title"],
};
</script>

<template>
  <div>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please <a
        href="https://browsehappy.com/">upgrade your browser</a> to improve your
        experience and security.
      </p>
    <![endif]-->
    <Head :title="title" />

    <div class="body-wrapper">
      <header
        class="ltn__header-area ltn__header-4 ltn__header-6 ltn__header-transparent--- gradient-color-2---"
        style="z-index: 1000"
      >
        <!-- ltn__header-top-area start -->
        <div class="ltn__header-top-area top-area-color-white">
          <div class="container">
            <div class="row">
              <div class="col-md-7">
                <div class="ltn__top-bar-menu">
                  <ul>
                    <li>
                      <a :href="'mailto:' + $page.props.email"
                        ><i class="icon-mail"></i> {{ $page.props.email }}</a
                      >
                    </li>
                    <li>
                      <a href="#"
                        ><i class="icon-placeholder"></i> {{ $page.props.address }}
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-5">
                <div class="top-bar-right text-right">
                  <div class="ltn__top-bar-menu">
                    <ul>
                      <li>
                        <!-- ltn__language-menu -->
                        <div class="ltn__drop-menu ltn__currency-menu ltn__language-menu">
                          <ul>
                            <li>
                              <a href="#" class="dropdown-toggle"
                                ><span class="active-currency">{{
                                  $t("locales." + $page.props.locale)
                                }}</span></a
                              >
                              <ul>
                                <li
                                  v-for="lang in this.$page.props.locales"
                                  :key="lang"
                                  @click="setLocale(lang)"
                                >
                                  <a href="#">{{ $t("locales." + lang) }}</a>
                                </li>
                                <!--                                                            <li><a href="#">Bengali</a></li>-->
                                <!--                                                            <li><a href="#">Chinese</a></li>-->
                                <!--                                                            <li><a href="#">English</a></li>-->
                                <!--                                                            <li><a href="#">French</a></li>-->
                                <!--                                                            <li><a href="#">Hindi</a></li>-->
                              </ul>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li>
                        <!-- ltn__social-media -->
                        <div class="ltn__social-media">
                          <ul>
                            <li>
                              <a
                                :href="$page.props.facebook"
                                title="Facebook"
                                target="_blank"
                                ><i class="fab fa-facebook-f"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                :href="$page.props.twitter"
                                title="Twitter"
                                target="_blank"
                                ><i class="fab fa-twitter"></i
                              ></a>
                            </li>

                            <li>
                              <a
                                :href="$page.props.instagram"
                                title="Instagram"
                                target="_blank"
                                ><i class="fab fa-instagram"></i
                              ></a>
                            </li>
                            <li>
                              <a
                                :href="$page.props.youtube"
                                title="youtube"
                                target="_blank"
                                ><i class="fab fa-youtube"></i
                              ></a>
                            </li>
                            <!-- <li>
                              <a href="#" title="Dribbble"
                                ><i class="fab fa-dribbble"></i
                              ></a>
                            </li> -->
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ltn__header-top-area end -->

        <!-- ltn__header-middle-area start -->
        <div class="ltn__header-middle-area ltn__header-sticky ltn__sticky-bg-white">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="site-logo">
                  <Link :href="route('welcome')"
                    ><img src="/img/oldlogo-1.png" alt="Logo" style="height: 63px"
                  /></Link>
                </div>
              </div>
              <div class="col header-menu-column">
                <div class="header-menu d-none d-xl-block">
                  <nav>
                    <div class="ltn__main-menu">
                      <ul>
                        <li>
                          <Link href="/" id="home">{{ $t("nav_menu.pages.home") }}</Link>
                        </li>
                        <!-- <li>
                          <Link :href="route('about-us')">
                            {{ $t("nav_menu.help.about_us") }}
                          </Link> -->
                        <!-- <ul>
                            <li>
                              <Link :href="route('about-us')">
                                {{ $t("nav_menu.help.about_us") }}
                              </Link>
                            </li>
                            <li>
                              <Link :href="route('faq')">
                                {{ $t("nav_menu.help.faq") }}
                              </Link>
                            </li>
                          </ul> -->
                        <!-- </li> -->
                        <li>
                          <Link :href="route('listing')"
                            >{{ $t("nav_menu.pages.products") }}
                          </Link>
                          <!-- <ul>
                            <li>
                              <Link :href="route('listing')"
                                >{{ $t("nav_menu.pages.products") }}
                              </Link>
                            </li>
                            <li>
                              <a href="#"
                                >{{ $t("nav_menu.other") }}
                                <span class="float-right">>></span></a
                              >
                              <ul>
                                <li v-if="$page.props.auth">
                                  <Link :href="route('wishlist.index')">{{
                                    $t("nav_menu.pages.wishlist")
                                  }}</Link>
                                </li>
                                <li>
                                  <Link :href="route('checkout.show')">{{
                                    $t("nav_menu.pages.checkout")
                                  }}</Link>
                                </li>
                                <li>
                                  <Link :href="route('trackOrder.index')">{{
                                    $t("nav_menu.pages.order_tracking")
                                  }}</Link>
                                </li>
                              </ul>
                            </li>
                          </ul> -->
                        </li>

                        <li>
                          <Link :href="route('blog.index')">{{
                            $t("nav_menu.pages.blog")
                          }}</Link>
                        </li>
                        <li>
                          <Link :href="route('trackOrder.index')">{{
                            $t("nav_menu.pages.order_tracking")
                          }}</Link>
                        </li>
                        <li>
                          <Link :href="route('contact-us')">{{
                            $t("nav_menu.help.contact_us")
                          }}</Link>
                        </li>
                        <li>
                          <Link :href="route('about-us')">
                            {{ $t("nav_menu.help.about_us") }}
                          </Link>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </div>
              </div>
              <div class="col">
                <div class="ltn__header-options">
                  <!-- ltn__currency-menu -->
                  <div class="ltn__drop-menu ltn__currency-menu">
                    <ul>
                      <li>
                        <a href="#" class="dropdown-toggle"
                          ><span class="active-currency">{{
                            $t("currencies." + $page.props.currency)
                          }}</span></a
                        >
                        <ul>
                          <li
                            v-for="currency in this.$page.props.currencies"
                            :key="currency"
                            @click="setCurrency(currency)"
                          >
                            <a href="#">{{ $t("currencies." + currency) }}</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <!-- header-search-1 -->
                  <div class="header-search-wrap">
                    <div class="header-search-1">
                      <div class="search-icon">
                        <i class="icon-search for-search-show"></i>
                        <i class="icon-cancel for-search-close"></i>
                      </div>
                    </div>
                    <div class="header-search-1-form">
                      <form id="#" method="get" action="#">
                        <input
                          type="text"
                          name="search"
                          value=""
                          :placeholder="$t('listing.search')"
                        />
                        <button type="submit">
                          <span><i class="icon-search"></i></span>
                        </button>
                      </form>
                    </div>
                  </div>
                  <!-- user-menu -->
                  <div class="ltn__drop-menu user-menu">
                    <ul>
                      <li>
                        <a href="#"><i class="icon-user"></i></a>
                        <ul>
                          <li v-if="!$page.props.auth">
                            <span class="utilize-btn-icon">
                              <i class="icofont-login"></i>
                            </span>
                            <Link :href="route('login')">
                              {{ $t("nav_menu.pages.login") }}</Link
                            >
                          </li>
                          <li v-if="!$page.props.auth">
                            <span class="utilize-btn-icon">
                              <i class="icofont-user"></i>
                            </span>
                            <Link :href="route('register')"
                              >{{ $t("nav_menu.pages.register") }}
                            </Link>
                          </li>
                          <!--                                                    <li><a href="register.html">Register</a></li>-->
                          <li v-if="$page.props.auth">
                            <span class="utilize-btn-icon">
                              <i class="icofont-user"> </i>
                            </span>
                            <Link :href="route('account')">
                              {{ $t("nav_menu.pages.account") }}</Link
                            >
                          </li>
                          <li>
                            <Link v-if="$page.props.auth" :href="route('wishlist.index')"
                              ><span class="utilize-btn-icon">
                                <i class="icofont-heart"
                                  >({{ $page.props.wcount }})</i
                                > </span
                              >{{ $t("nav_menu.pages.wishlist") }}</Link
                            >
                          </li>

                          <li v-if="$page.props.auth">
                            <a @click="logout()" href="#" title="Logout">
                              <span class="utilize-btn-icon">
                                <i class="icofont-logout"></i>
                              </span>
                              {{ $t("nav_menu.pages.logout") }}
                            </a>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <!-- mini-cart -->
                  <div class="mini-cart-icon">
                    <a href="#ltn__utilize-cart-menu" class="ltn__utilize-toggle">
                      <i class="icon-shopping-cart"></i>
                      <sup>{{
                        $page.props.shopping_session
                          ? $page.props.shopping_session.cart_items.length
                          : 0
                      }}</sup>
                    </a>
                  </div>
                  <!-- Mobile Menu Button -->
                  <div class="mobile-menu-toggle d-xl-none">
                    <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                      <svg viewBox="0 0 800 600">
                        <path
                          d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                          id="top"
                        ></path>
                        <path d="M300,320 L540,320" id="middle"></path>
                        <path
                          d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                          id="bottom"
                          transform="translate(480, 320) scale(1, -1) translate(-480, -318) "
                        ></path>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ltn__header-middle-area end -->
      </header>
      <!-- Utilize Cart Menu Start -->
      <!--            <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">-->
      <!--                <div class="ltn__utilize-menu-inner ltn__scrollbar">-->
      <!--                    <div class="ltn__utilize-menu-head">-->
      <!--                        <span class="ltn__utilize-menu-title">Cart</span>-->
      <!--                        <button class="ltn__utilize-close">×</button>-->
      <!--                    </div>-->
      <!--                    <div class="mini-cart-product-area ltn__scrollbar">-->
      <!--                        <div class="mini-cart-item clearfix">-->
      <!--                            <div class="mini-cart-img">-->
      <!--                                <a href="#"><img src="/img/product/1.png" alt="Image"></a>-->
      <!--                                <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>-->
      <!--                            </div>-->
      <!--                            <div class="mini-cart-info">-->
      <!--                                <h6><a href="#">Beard Care Oil</a></h6>-->
      <!--                                <span class="mini-cart-quantity">1 x $65.00</span>-->
      <!--                            </div>-->
      <!--                        </div>-->
      <!--                        <div class="mini-cart-item clearfix">-->
      <!--                            <div class="mini-cart-img">-->
      <!--                                <a href="#"><img src="/img/product/15.png" alt="Image"></a>-->
      <!--                                <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>-->
      <!--                            </div>-->
      <!--                            <div class="mini-cart-info">-->
      <!--                                <h6><a href="#">Beard Scissors</a></h6>-->
      <!--                                <span class="mini-cart-quantity">1 x $15.00</span>-->
      <!--                            </div>-->
      <!--                        </div>-->
      <!--                        <div class="mini-cart-item clearfix">-->
      <!--                            <div class="mini-cart-img">-->
      <!--                                <a href="#"><img src="/img/product/9.png" alt="Image"></a>-->
      <!--                                <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>-->
      <!--                            </div>-->
      <!--                            <div class="mini-cart-info">-->
      <!--                                <h6><a href="#">Beard Shampoo</a></h6>-->
      <!--                                <span class="mini-cart-quantity">1 x $92.00</span>-->
      <!--                            </div>-->
      <!--                        </div>-->
      <!--                        <div class="mini-cart-item clearfix">-->
      <!--                            <div class="mini-cart-img">-->
      <!--                                <a href="#"><img src="/img/product/4.png" alt="Image"></a>-->
      <!--                                <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>-->
      <!--                            </div>-->
      <!--                            <div class="mini-cart-info">-->
      <!--                                <h6><a href="#">Beard Growth Oil</a></h6>-->
      <!--                                <span class="mini-cart-quantity">1 x $68.00</span>-->
      <!--                            </div>-->
      <!--                        </div>-->
      <!--                    </div>-->
      <!--                    <div class="mini-cart-footer">-->
      <!--                        <div class="mini-cart-sub-total">-->
      <!--                            <h5>Subtotal: <span>$310.00</span></h5>-->
      <!--                        </div>-->
      <!--                        <div class="btn-wrapper">-->
      <!--                            <a href="cart.html" class="theme-btn-1 btn btn-effect-1">View Cart</a>-->
      <!--                            <a href="cart.html" class="theme-btn-2 btn btn-effect-2">Checkout</a>-->
      <!--                        </div>-->
      <!--                        <p>Free Shipping on All Orders Over $100!</p>-->
      <!--                    </div>-->

      <!--                </div>-->
      <!--            </div>-->
      <CartMenu />
      <!-- Utilize Mobile Menu Start -->
      <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
        <div class="ltn__utilize-menu-inner ltn__scrollbar">
          <div class="ltn__utilize-menu-head">
            <div class="site-logo">
              <Link :href="route('welcome')"
                ><img src="/img/oldlogo-1.png" alt="Logo" style="height: 63px"
              /></Link>
            </div>
            <button class="ltn__utilize-close">×</button>
          </div>
          <div class="ltn__utilize-menu-search-form">
            <form action="#">
              <input type="text" placeholder="Search..." />
              <button><i class="fas fa-search"></i></button>
            </form>
          </div>
          <div class="ltn__utilize-menu">
            <ul>
              <li>
                <Link :href="route('listing')">{{ $t("nav_menu.pages.home") }}</Link>
              </li>

              <li>
                <Link :href="route('listing')">{{ $t("nav_menu.pages.products") }}</Link>
              </li>
              <li>
                <Link :href="route('blog.index')">{{ $t("nav_menu.pages.blog") }}</Link>
              </li>
              <li>
                <Link :href="route('trackOrder.index')">{{
                  $t("nav_menu.pages.order_tracking")
                }}</Link>
              </li>
              <!-- <li>
                <a href="#">{{ $t("nav_menu.pages.pages") }}</a>
                <ul class="sub-menu">
                  <li>
                    <Link :href="route('faq')">
                      {{ $t("nav_menu.help.faq") }}
                    </Link>
                  </li>
                  <li>
                    <Link :href="route('contact-us')">{{
                      $t("nav_menu.help.contact_us")
                    }}</Link>
                  </li>
                  <li><Link :href="route('cartitem.index')">Cart</Link></li>
                  <li>
                    <Link v-if="$page.props.auth" :href="route('wishlist.index')">{{
                      $t("nav_menu.pages.wishlist")
                    }}</Link>
                  </li>
                  <li>
                    <Link :href="route('checkout.show')">{{
                      $t("nav_menu.pages.checkout")
                    }}</Link>
                  </li>
                  <li>
                    <Link :href="route('trackOrder.index')">{{
                      $t("nav_menu.pages.order_tracking")
                    }}</Link>
                  </li>
                  <li>
                    <Link v-if="$page.props.auth" :href="route('account')">
                      {{ $t("nav_menu.pages.account") }}</Link
                    >
                  </li>
                </ul>
              </li> -->
              <li>
                <Link :href="route('contact-us')">{{
                  $t("nav_menu.help.contact_us")
                }}</Link>
              </li>
              <li>
                <Link :href="route('about-us')">
                  {{ $t("nav_menu.help.about_us") }}
                </Link>
              </li>
            </ul>
          </div>
          <div class="ltn__utilize-buttons ltn__utilize-buttons-2">
            <ul>
              <li v-if="!$page.props.auth">
                <Link :href="route('login')" title="Login">
                  <span class="utilize-btn-icon">
                    <i class="far fa-user"></i>
                  </span>
                  {{ $t("nav_menu.pages.login") }}
                </Link>
              </li>
              <li v-if="!$page.props.auth">
                <span class="utilize-btn-icon">
                  <i class="far fa-user"></i>
                </span>
                <Link :href="route('register')"
                  >{{ $t("nav_menu.pages.register") }}
                </Link>
              </li>
              <li v-if="$page.props.auth">
                <span class="utilize-btn-icon">
                  <i class="far fa-user"></i>
                </span>
                <Link :href="route('account')"> {{ $t("nav_menu.pages.account") }}</Link>
              </li>
              <li v-if="$page.props.auth">
                <Link :href="route('wishlist.index')" title="Wishlist">
                  <span class="utilize-btn-icon">
                    <i class="far fa-heart"></i>
                    <sup>{{ $page.props.wcount }}</sup>
                  </span>
                  {{ $t("nav_menu.pages.wishlist") }}
                </Link>
              </li>

              <li>
                <Link :href="route('cartitem.index')" :title="$t('nav_menu.pages.cart')">
                  <span class="utilize-btn-icon">
                    <i class="fas fa-shopping-cart"></i>
                    <sup>5</sup>
                  </span>
                  {{ $t("nav_menu.pages.cart") }}
                </Link>
              </li>
              <li v-if="$page.props.auth">
                <a @click="logout()" href="#" title="Logout">
                  <span class="utilize-btn-icon">
                    <i class="icofont-logout"></i>
                  </span>
                  {{ $t("nav_menu.pages.logout") }}
                </a>
              </li>
            </ul>
          </div>
          <div class="ltn__social-media-2">
            <ul>
              <li>
                <a :href="$page.props.facebook" title="Facebook" target="_blank"
                  ><i class="fab fa-facebook-f"></i
                ></a>
              </li>
              <li>
                <a :href="$page.props.twitter" title="Twitter" target="_blank"
                  ><i class="fab fa-twitter"></i
                ></a>
              </li>

              <li>
                <a :href="$page.props.instagram" title="Instagram" target="_blank"
                  ><i class="fab fa-instagram"></i
                ></a>
              </li>
              <li>
                <a :href="$page.props.youtube" title="youtube" target="_blank"
                  ><i class="fab fa-youtube"></i
                ></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Utilize Mobile Menu End -->

      <div class="ltn__utilize-overlay"></div>

      <main>
        <slot />
      </main>

      <!-- FEATURE AREA START ( Feature - 3) -->
      <div class="ltn__feature-area before-bg-bottom-2 mb--30--- plr--5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="ltn__feature-item-box-wrap ltn__border-between-column white-bg">
                <div class="row">
                  <div class="col-xl-3 col-md-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-8">
                      <div class="ltn__feature-icon">
                        <img src="/img/icons/svg/4-track.svg" alt="#" />
                      </div>
                      <div class="ltn__feature-info">
                        <h4>{{ $t("feature.title4") }}</h4>
                        <p>{{ $t("feature.desc4") }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-8">
                      <div class="ltn__feature-icon">
                        <img src="/img/icons/svg/5-madel.svg" alt="#" />
                      </div>
                      <div class="ltn__feature-info">
                        <h4>{{ $t("feature.title3") }}</h4>
                        <p>{{ $t("feature.desc3") }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-8">
                      <div class="ltn__feature-icon">
                        <img src="/img/icons/svg/6-return.svg" alt="#" />
                      </div>
                      <div class="ltn__feature-info">
                        <h4>{{ $t("feature.title2") }}</h4>
                        <p>{{ $t("feature.desc2") }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-3 col-md-6 col-12">
                    <div class="ltn__feature-item ltn__feature-item-8">
                      <div class="ltn__feature-icon">
                        <img src="/img/icons/svg/7-support.svg" alt="#" />
                      </div>
                      <div class="ltn__feature-info">
                        <h4>{{ $t("feature.title1") }}</h4>
                        <p>{{ $t("feature.desc1") }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- FEATURE AREA END -->

      <!-- FOOTER AREA START -->
      <footer class="ltn__footer-area">
        <div class="footer-top-area section-bg-1 plr--5">
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                <div class="footer-widget footer-about-widget">
                  <div class="footer-logo">
                    <div class="site-logo">
                      <img src="/img/oldlogo-1.png" alt="Logo" style="height: 63px" />
                    </div>
                  </div>
                  <p>
                    {{ $page.props.company_description }}
                  </p>
                  <div class="footer-address">
                    <ul>
                      <li>
                        <div class="footer-address-icon">
                          <i class="icon-placeholder"></i>
                        </div>
                        <div class="footer-address-info">
                          <p>{{ $page.props.address }}</p>
                        </div>
                      </li>
                      <li>
                        <div class="footer-address-icon">
                          <i class="icon-call"></i>
                        </div>
                        <div class="footer-address-info">
                          <p>
                            <a :href="'tel:' + $page.props.phone">
                              {{ $page.props.phone }}</a
                            >
                          </p>
                        </div>
                      </li>
                      <li>
                        <div class="footer-address-icon">
                          <i class="icon-mail"></i>
                        </div>
                        <div class="footer-address-info">
                          <p>
                            <a :href="'mailto:' + $page.props.email">
                              {{ $page.props.email }}</a
                            >
                          </p>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="ltn__social-media mt-20">
                    <ul>
                      <li>
                        <a :href="$page.props.facebook" title="Facebook" target="_blank"
                          ><i class="fab fa-facebook-f"></i
                        ></a>
                      </li>
                      <li>
                        <a :href="$page.props.twitter" title="Twitter" target="_blank"
                          ><i class="fab fa-twitter"></i
                        ></a>
                      </li>
                      <li>
                        <a :href="$page.props.instagram" title="instagram" target="_blank"
                          ><i class="fab fa-instagram"></i
                        ></a>
                      </li>
                      <!-- <li>
                        <a href="#" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                      </li> -->
                      <li>
                        <a :href="$page.props.youtube" title="Youtube" target="_blank"
                          ><i class="fab fa-youtube"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                <div class="footer-widget footer-menu-widget clearfix">
                  <h4 class="footer-title">{{ $t("footer.company") }}</h4>
                  <div class="footer-menu">
                    <ul>
                      <li>
                        <Link :href="route('about-us')">
                          {{ $t("nav_menu.help.about_us") }}
                        </Link>
                      </li>
                      <li>
                        <Link :href="route('blog.index')"
                          >{{ $t("nav_menu.pages.blog") }}
                        </Link>
                      </li>
                      <li>
                        <Link :href="route('listing')"
                          >{{ $t("nav_menu.pages.products") }}
                        </Link>
                      </li>
                      <!-- <li><a href="locations.html">Locations Map</a></li> -->
                      <li>
                        <Link :href="route('faq')">
                          {{ $t("nav_menu.help.faq") }}
                        </Link>
                      </li>
                      <li>
                        <Link :href="route('contact-us')"
                          >{{ $t("nav_menu.help.contact_us") }}
                        </Link>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                <div class="footer-widget footer-menu-widget clearfix">
                  <h4 class="footer-title">{{ $t("footer.services") }}</h4>
                  <div class="footer-menu">
                    <ul>
                      <li>
                        <Link :href="route('trackOrder.index')">{{
                          $t("nav_menu.pages.order_tracking")
                        }}</Link>
                      </li>
                      <li>
                        <Link v-if="$page.props.auth" :href="route('wishlist.index')">{{
                          $t("nav_menu.pages.wishlist")
                        }}</Link>
                      </li>
                      <li>
                        <Link :href="route('login')">
                          {{ $t("nav_menu.pages.login") }}</Link
                        >
                      </li>
                      <li>
                        <Link :href="route('account')">
                          {{ $t("nav_menu.pages.account") }}</Link
                        >
                      </li>
                      <li>
                        <Link :href="route('terms-conditions')">
                          {{ $t("nav_menu.help.terms_conditions") }}
                        </Link>
                      </li>
                      <li><Link :href="route('privacy-policy')">
                        {{ $t("nav_menu.help.privacy_policy") }}
                      </Link>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                <div class="footer-widget footer-menu-widget clearfix">
                  <h4 class="footer-title">{{ $t("footer.customer_care") }}</h4>
                  <div class="footer-menu">
                    <ul>
                      <li>
                        <Link :href="route('login')">
                          {{ $t("nav_menu.pages.login") }}</Link
                        >
                      </li>
                      <li>
                        <Link :href="route('account')">
                          {{ $t("nav_menu.pages.account") }}</Link
                        >
                      </li>
                      <li>
                        <Link v-if="$page.props.auth" :href="route('wishlist.index')">{{
                          $t("nav_menu.pages.wishlist")
                        }}</Link>
                      </li>
                      <li>
                        <Link :href="route('trackOrder.index')">{{
                          $t("nav_menu.pages.order_tracking")
                        }}</Link>
                      </li>
                      <li>
                        <Link :href="route('faq')">
                          {{ $t("nav_menu.help.faq") }}
                        </Link>
                      </li>
                      <li>
                        <Link :href="route('contact-us')"
                          >{{ $t("nav_menu.help.contact_us") }}
                        </Link>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                <div class="footer-widget footer-newsletter-widget">
                  <h4 class="footer-title">{{ $t("footer.newsletter") }}</h4>
                  <p>{{ $t("footer.subscribe_desc") }}</p>
                  <div class="footer-newsletter">
                    <form action="#">
                      <input type="email" name="email" :placeholder="$t('login.email')" />
                      <div class="btn-wrapper">
                        <button class="theme-btn-1 btn" type="submit">
                          <i class="fas fa-location-arrow"></i>
                        </button>
                      </div>
                    </form>
                  </div>
                  <h5 class="mt-30">{{ $t("listing.checkout_card.accept") }}</h5>
                  <img src="/img/icons/payment-4.png" alt="Payment Image" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ltn__copyright-area ltn__copyright-2 section-bg-2 plr--5">
          <div class="container-fluid ltn__border-top-2">
            <div class="row">
              <div class="col-md-6 col-12">
                <div class="ltn__copyright-design clearfix">
                  <p>
                    Himpies © <span class="current-year"></span> Developed by Cover Data
                  </p>
                </div>
              </div>

              <div class="col-md-6 col-12 align-self-center">
                <div class="ltn__copyright-menu text-right">
                  <ul>
                    <li>
                      <Link :href="route('terms-conditions')">
                        {{ $t("nav_menu.help.terms_conditions") }}
                      </Link>
                    </li>
                    <li>
                      <Link :href="route('privacy-policy')">
                        {{ $t("nav_menu.help.privacy_policy") }}
                      </Link>
                    </li>
                    <!-- <li>
                      <a href="#">Claim</a>
                    </li> -->
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- FOOTER AREA END -->

      <AddToCartModal />
      <QuickViewModal />
      <AddToWishListModel />
      <CheckoutModal />
    </div>

    <!-- preloader area start -->
    <div class="preloader d-none" id="preloader">
      <div class="preloader-inner">
        <div class="spinner">
          <div class="dot1"></div>
          <div class="dot2"></div>
        </div>
      </div>
    </div>
    <!-- preloader area end -->
  </div>
</template>
<style>
@media only screen and (min-width: 800px) {
  #scrollUp {
    margin-bottom: 40px;
    /* z-index: 2147483637; */
  }
}
@media only screen and (max-width: 600px) {
  #scrollUp {
    margin-bottom: 60px;
    margin-right: 20px;
    /* z-index: 2147483637; */
  }
}
</style>
