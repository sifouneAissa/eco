<script>
    import {ref, onMounted, toRefs} from "vue";
    import {Inertia} from "@inertiajs/inertia";
    import {Head, Link} from "@inertiajs/inertia-vue3";
    import ApplicationMark from "@/Components/ApplicationMark.vue";
    import Banner from "@/Components/Banner.vue";
    import Dropdown from "@/Components/Dropdown.vue";
    import DropdownLink from "@/Components/DropdownLink.vue";
    import NavLink from "@/Components/NavLink.vue";
    import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
    import Cart from "@/Pages/GuestLayout/Cart.vue";
    import Notification from "@/Pages/GuestLayout/Notification.vue";
    import setPassword from "@/Pages/Password/setPassword.vue";
    import "./../../assets/vendor/owl-carousel/owl.carousel";

    import {useToast} from "vue-toastification";
    import {usePage} from "@inertiajs/inertia-vue3";

    export default {
        components: {
            setPassword,
            Notification,
            Cart,
            ResponsiveNavLink,
            NavLink,
            DropdownLink,
            Dropdown,
            Banner,
            ApplicationMark,
            Link,
            Head
        },
        data() {
            return {
                    submited : false,
                    order_id : ''
            }
        },
        computed : {
            vOrder : function (){
                return this.order_id.match(/^\d+$/);
            }
        },
        methods: {

            trackOrder : function (){
                this.submited = true;
                if(this.vOrder)
                Inertia.get(
                    this.route("trackOrder",{id: this.order_id}),
                );
            },
            setLocale: function (lang) {
                Inertia.post(
                    route("setLocale"),
                    {locale: lang},
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
                    {currency: currency},
                    {
                        onSuccess: () => window.location.reload(),
                    }
                );
            },
        },
        props: ["title"],
        mounted() {
            // clear interval
            clearInterval(window.idleIntervalTimer);

            if (this.$page.component === "Listing") {
                clearInterval(window.idleIntervalTimer);
                window.idleIntervalTimer = setInterval(function () {
                    Inertia.reload({
                        only: ["products"],
                        preserveScroll: true,
                    });
                }, 20000);
            } else if (this.$page.component === "Blogs") {
                window.idleIntervalTimer = setInterval(function () {
                    Inertia.reload({
                        only: ["blogs"],
                        preserveScroll: true,
                    });
                }, 20000);
            }

            let app = this;
            if (this.$page.props.setPassword) {
                let modal = $("#set-password");

                modal.on("hidden.bs.modal", function () {
                    app.$emit("ResetModel");
                });

                modal.modal("show");
            }

            $(document).ready(function () {
                if (app.$page.props.isRtl) {
                    // ===========Select2============
                    $("select").select2();

                    // ===========My Account Tabs============
                    $(window).on("hashchange", function () {
                        var url = document.location.toString();
                        if (url.match("#")) {
                            //$('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
                            $('a[href="' + window.location.hash + '"]').trigger("click");
                        }
                        $(".nav-tabs a").on("shown", function (e) {
                            window.location.hash = e.target.hash;
                        });
                    });
                    var url = document.location.toString();
                    if (url.match("#")) {
                        //$('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
                        $('a[href="' + window.location.hash + '"]').trigger("click");
                    }
                    // Change hash for page-reload
                    $(".nav-tabs a").on("shown", function (e) {
                        window.location.hash = e.target.hash;
                    });

                    // Category Owl Carousel
                    const objowlcarousel = $(".owl-carousel-category");
                    if (objowlcarousel.length > 0) {
                        objowlcarousel.owlCarousel({
                            rtl: true,
                            responsive: {
                                0: {
                                    items: 3,
                                },
                                600: {
                                    items: 4,
                                },
                                1000: {
                                    items: 6,
                                },
                                1200: {
                                    items: 8,
                                },
                            },
                            loop: true,
                            lazyLoad: true,
                            autoplay: true,
                            dots: false,
                            autoplaySpeed: 1000,
                            autoplayTimeout: 2000,
                            autoplayHoverPause: true,
                            nav: true,
                            navText: [
                                "<i class='fa fa-chevron-left'></i>",
                                "<i class='fa fa-chevron-right'></i>",
                            ],
                        });
                    }

                    // Homepage Owl Carousel
                    var fiveobjowlcarousel = $(".owl-carousel-four");
                    if (fiveobjowlcarousel.length > 0) {
                        fiveobjowlcarousel.owlCarousel({
                            rtl: true,
                            responsive: {
                                0: {
                                    items: 1,
                                },
                                600: {
                                    items: 2,
                                },
                                1000: {
                                    items: 4,
                                },
                                1200: {
                                    items: 4,
                                },
                            },

                            lazyLoad: true,
                            pagination: false,
                            loop: true,
                            dots: false,
                            autoPlay: 2000,
                            nav: true,
                            stopOnHover: true,
                            navText: [
                                "<i class='icofont-thin-left'></i>",
                                "<i class='icofont-thin-right'></i>",
                            ],
                        });
                    }

                    // Owl Carousel Five
                    var fiveobjowlcarousel = $(".owl-carousel-five");
                    if (fiveobjowlcarousel.length > 0) {
                        fiveobjowlcarousel.owlCarousel({
                            rtl: true,
                            responsive: {
                                0: {
                                    items: 2,
                                },
                                600: {
                                    items: 3,
                                },
                                1000: {
                                    items: 4,
                                },
                                1200: {
                                    items: 5,
                                },
                            },
                            lazyLoad: true,
                            pagination: false,
                            loop: true,
                            dots: false,
                            autoPlay: 2000,
                            nav: true,
                            stopOnHover: true,
                            navText: [
                                "<i class='icofont-thin-left'></i>",
                                "<i class='icofont-thin-right'></i>",
                            ],
                        });
                    }

                    // Homepage Ad Owl Carousel
                    const mainslider = $(".homepage-ad");
                    if (mainslider.length > 0) {
                        mainslider.owlCarousel({
                            rtl: true,
                            responsive: {
                                0: {
                                    items: 2,
                                },
                                764: {
                                    items: 2,
                                },
                                765: {
                                    items: 1,
                                },
                                1200: {
                                    items: 1,
                                },
                            },
                            lazyLoad: true,
                            loop: true,
                            autoplay: true,
                            autoplaySpeed: 1000,
                            dots: false,
                            autoplayTimeout: 2000,
                            nav: true,
                            navText: [
                                "<i class='fa fa-chevron-left'></i>",
                                "<i class='fa fa-chevron-right'></i>",
                            ],
                            autoplayHoverPause: true,
                        });
                    }

                    // Tooltip
                    $('[data-toggle="tooltip"]').tooltip();
                } else {
                    $("select").select2();
                    // ===========My Account Tabs============
                    $(window).on("hashchange", function () {
                        var url = document.location.toString();
                        if (url.match("#")) {
                            //$('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
                            $('a[href="' + window.location.hash + '"]').trigger("click");
                        }
                        $(".nav-tabs a").on("shown", function (e) {
                            window.location.hash = e.target.hash;
                        });
                    });
                    var url = document.location.toString();
                    if (url.match("#")) {
                        //$('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
                        $('a[href="' + window.location.hash + '"]').trigger("click");
                    }
                    // Change hash for page-reload
                    $(".nav-tabs a").on("shown", function (e) {
                        window.location.hash = e.target.hash;
                    });

                    // Category Owl Carousel
                    const objowlcarousel = $(".owl-carousel-category");
                    if (objowlcarousel.length > 0) {
                        objowlcarousel.owlCarousel({
                            responsive: {
                                0: {
                                    items: 3,
                                },
                                600: {
                                    items: 4,
                                },
                                1000: {
                                    items: 6,
                                },
                                1200: {
                                    items: 8,
                                },
                            },
                            loop: true,
                            lazyLoad: true,
                            autoplay: true,
                            dots: false,
                            autoplaySpeed: 1000,
                            autoplayTimeout: 2000,
                            autoplayHoverPause: true,
                            nav: true,
                            navText: [
                                "<i class='fa fa-chevron-left'></i>",
                                "<i class='fa fa-chevron-right'></i>",
                            ],
                        });
                    }

                    // Homepage Owl Carousel
                    var fiveobjowlcarousel = $(".owl-carousel-four");
                    if (fiveobjowlcarousel.length > 0) {
                        fiveobjowlcarousel.owlCarousel({
                            responsive: {
                                0: {
                                    items: 1,
                                },
                                600: {
                                    items: 2,
                                },
                                1000: {
                                    items: 4,
                                },
                                1200: {
                                    items: 4,
                                },
                            },

                            lazyLoad: true,
                            pagination: false,
                            loop: true,
                            dots: false,
                            autoPlay: 2000,
                            nav: true,
                            stopOnHover: true,
                            navText: [
                                "<i class='icofont-thin-left'></i>",
                                "<i class='icofont-thin-right'></i>",
                            ],
                        });
                    }

                    // Owl Carousel Five
                    var fiveobjowlcarousel = $(".owl-carousel-five");
                    if (fiveobjowlcarousel.length > 0) {
                        fiveobjowlcarousel.owlCarousel({
                            responsive: {
                                0: {
                                    items: 2,
                                },
                                600: {
                                    items: 3,
                                },
                                1000: {
                                    items: 4,
                                },
                                1200: {
                                    items: 5,
                                },
                            },
                            lazyLoad: true,
                            pagination: false,
                            loop: true,
                            dots: false,
                            autoPlay: 2000,
                            nav: true,
                            stopOnHover: true,
                            navText: [
                                "<i class='icofont-thin-left'></i>",
                                "<i class='icofont-thin-right'></i>",
                            ],
                        });
                    }

                    // Homepage Ad Owl Carousel
                    const mainslider = $(".homepage-ad");
                    if (mainslider.length > 0) {
                        mainslider.owlCarousel({
                            responsive: {
                                0: {
                                    items: 2,
                                },
                                764: {
                                    items: 2,
                                },
                                765: {
                                    items: 1,
                                },
                                1200: {
                                    items: 1,
                                },
                            },
                            lazyLoad: true,
                            loop: true,
                            autoplay: true,
                            autoplaySpeed: 1000,
                            dots: false,
                            autoplayTimeout: 2000,
                            nav: true,
                            navText: [
                                "<i class='fa fa-chevron-left'></i>",
                                "<i class='fa fa-chevron-right'></i>",
                            ],
                            autoplayHoverPause: true,
                        });
                    }

                    // Tooltip
                    $('[data-toggle="tooltip"]').tooltip();
                }

                $(".owl-carousel-category").removeClass("owl-hidden");
                $(".owl-carousel-four").removeClass("owl-hidden");
                $(".owl-carousel-five").removeClass("owl-hidden");
                $(".homepage-ad").removeClass("owl-hidden");
            });
        },
    };

    // defineProps({
    //     title: String,
    // });
    //
    // const setLocale = (lang) => {
    //     Inertia.post(
    //         route("setLocale"),
    //         {locale: lang},
    //         {
    //             onSuccess: () => window.location.reload(),
    //         }
    //     );
    // };
    //
    // const setCurrency = (currency) => {
    //     Inertia.post(
    //         route("setCurrency"),
    //         {currency: currency},
    //         {
    //             onSuccess: () => window.location.reload(),
    //         }
    //     );
    // };
    //
    // const logout = () => {
    //     Inertia.post(
    //         route("logout"),
    //         {},
    //         {
    //             onSuccess: () => window.location.reload(),
    //         }
    //     );
    // };
</script>

<template>
    <div>
        <Head :title="title"/>
        <Banner/>
        <nav class="navbar navbar-expand-lg navbar-light bg-light osahan-nav shadow-sm">
            <div class="container">
                <Link class="navbar-brand" href="/"><img alt="logo" class="nav-osahan-pic" :src="$page.props.logo"/>
                </Link>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <Link class="nav-link" href="/"
                            >{{ $t("nav_menu.pages.home") }}
                                <span class="sr-only">(current)</span></Link
                            >
                        </li>
                        <li class="nav-item">
                            <!--                            <a class="nav-link" href="offers.html"><i class="icofont-sale-discount"></i> Products <span class="badge badge-danger">New</span></a>-->
                            <Link :href="route('listing')" class="nav-link"
                            ><i class="icofont-sale-discount"></i>
                                {{ $t("nav_menu.pages.products") }}
                                <span class="badge badge-danger">{{
                  $t("nav_menu.pages.new")
                }}</span></Link
                            >
                        </li>
                        <!-- <li class="nav-item dropdown">
                                        <a
                                            class="nav-link dropdown-toggle"
                                            href="#"
                                            role="button"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false"
                                        >
                                            Restaurants
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                                            <a class="dropdown-item" href="listing.html">Listing</a>
                                            <a class="dropdown-item" href="detail.html">Detail + Cart</a>
                                            <a class="dropdown-item" href="checkout.html">Checkout</a>
                                        </div>
                                    </li> -->
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                {{ $t("nav_menu.pages.pages") }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                                <Link class="dropdown-item" href="track-order.html">Track Order</Link>
                                <a class="dropdown-item" href="invoice.html">Invoice</a>
                                <a class="dropdown-item" :href="route('login')">{{
                                    $t("nav_menu.pages.login")
                                    }}</a>
                                <a class="dropdown-item" :href="route('register')">{{
                                    $t("nav_menu.pages.register")
                                    }}</a>
                                <!-- <a class="dropdown-item" href="404.html">404</a>
                                <a class="dropdown-item" href="extra.html">Extra :)</a> -->
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                {{ $t("nav_menu.help.help") }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                                <Link class="dropdown-item" :href="route('contact-us')">{{
                                    $t("nav_menu.help.contact_us")
                                    }}
                                </Link>
                                <Link class="dropdown-item" :href="route('about-us')">{{
                                    $t("nav_menu.help.about_us")
                                    }}
                                </Link>
                                <Link class="dropdown-item" :href="route('faq')">{{
                                    $t("nav_menu.help.faq")
                                    }}
                                </Link>
                                <Link class="dropdown-item" :href="route('privacy-policy')">{{
                                    $t("nav_menu.help.privacy_policy")
                                    }}
                                </Link>
                                <Link class="dropdown-item" :href="route('shipping-policy')">{{
                                    $t("nav_menu.help.shipping_policy")
                                    }}
                                </Link>
                                <Link class="dropdown-item" :href="route('terms-conditions')">{{
                                    $t("nav_menu.help.terms_conditions")
                                    }}
                                </Link>
                            </div>
                        </li>
                        <li v-if="$page.props.auth" class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <img
                                    alt="Generic placeholder image"
                                    :src="$page.props.user.profile_photo_url"
                                    class="nav-osahan-pic rounded-pill"
                                />
                                {{ $page.props.auth.name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                                <!--                                <Link :href="route('profile.show')">-->
                                <a class="dropdown-item" :href="route('profile.show')"
                                ><i class="icofont-user"></i> {{ $t("nav_menu.pages.profile") }}</a
                                >
                                <Link :href="route('account') + '#orders'" class="dropdown-item"
                                ><i class="icofont-food-cart"></i>
                                    {{ $t("nav_menu.pages.account") }}
                                </Link>
                                <!--                                    <Link  :href="route('account')+'#offers'" class="dropdown-item" ><i class="icofont-food-cart"></i> Offers</Link>-->
                                <!--                                    <Link  :href="route('account')+'#favourites'" class="dropdown-item" ><i class="icofont-food-cart"></i> Favourites</Link>-->
                                <!--                                    <Link  :href="route('account')+'#payments'" class="dropdown-item" ><i class="icofont-food-cart"></i> Payments</Link>-->
                                <!--                                    <Link  :href="route('account')+'#addresses'" class="dropdown-item" ><i class="icofont-food-cart"></i> Addresses</Link>-->
                                <!--                                <a class="dropdown-item" href="orders.html#addresses"><i class="icofont-location-pin"></i> Log out</a>-->
                                <form @submit.prevent="logout">
                                    <button type="submit" class="dropdown-item">
                                        <i class="icofont-logout"></i> {{ $t("nav_menu.pages.logout") }}
                                    </button>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-cart">
                            <Cart/>
                        </li>
                        <li v-if="$page.props.auth" class="nav-item dropdown dropdown-cart">
                            <Notification/>
                        </li>

                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <!--                                <i class="fas fa-shopping-basket"></i>-->
                                {{ $t("locales." + $page.props.locale) }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                                <a
                                    v-for="lang in this.$page.props.locales"
                                    :key="lang"
                                    @click="setLocale(lang)"
                                    class="dropdown-item"
                                    href="#"
                                >{{ $t("locales." + lang) }}</a
                                >
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                            >
                                <!--                                <i class="fas fa-shopping-basket"></i>-->
                                {{ $t("currencies." + $page.props.currency) }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                                <a
                                    v-for="currency in this.$page.props.currencies"
                                    :key="currency"
                                    @click="setCurrency(currency)"
                                    class="dropdown-item"
                                    href="#"
                                >{{ $t("currencies." + currency) }}</a
                                >
                            </div>
                        </li>

                        <li v-if="!$page.props.auth" class="nav-item  ">
                            <a class="nav-link" :href="route('login')" role="button">
                                {{ $t("nav_menu.pages.login") }}
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <div class="nav-link ">

                                <form @submit.prevent="trackOrder()" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                                <div class="input-group">
                                    <input v-model="order_id" required class="form-control" type="text" placeholder="Track order by id..."
                                           aria-label="Search" aria-describedby="basic-addon2"/>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-sm" type="submit"><i
                                            class="icofont-search"></i></button>
                                    </div>
                                </div>
                                </form>
                                <div v-if="submited && !vOrder">
                                    <p class="text-sm " style="color: red">
                                        {{ 'Please enter a valid id' }}
                                    </p>
                                </div>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="bg-light">
            <slot/>
        </main>

        <setPassword/>

        <footer class="pt-4 pb-4 text-center">
            <div class="container">
                <p class="mt-0 mb-0">© Copyright 2020 Osahan Eat. All Rights Reserved</p>
                <small class="mt-0 mb-0">
                    Made with <i class="fas fa-heart heart-icon text-danger"></i> by
                    <a
                        class="text-danger"
                        target="_blank"
                        href="https://www.instagram.com/iamgurdeeposahan/"
                    >Gurdeep Osahan</a
                    >
                    -
                    <a class="text-primary" target="_blank" href="https://askbootstrap.com/"
                    >Ask Bootstrap</a
                    >
                </small>
            </div>
        </footer>
    </div>
</template>
