<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import Cart from '@/Pages/GuestLayout/Cart.vue';

defineProps({
    title: String,
});

const setLocale = (lang) => {
    Inertia.post(route('setLocale'),{locale : lang},{
        onSuccess : () => window.location.reload()
    });
};

const setCurrency = (currency) => {
    Inertia.post(route('setCurrency'),{currency : currency},{
        onSuccess : () => window.location.reload()
    });
};


const logout = () => {
    Inertia.post(route('logout'),{},{
        onSuccess : () => window.location.reload()
    });
};

</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <nav class="navbar navbar-expand-lg navbar-light bg-light osahan-nav shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img alt="logo" src="img/logo.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="offers.html"><i class="icofont-sale-discount"></i> Offers <span class="badge badge-danger">New</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Restaurants
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                                <a class="dropdown-item" href="listing.html">Listing</a>
                                <a class="dropdown-item" href="detail.html">Detail + Cart</a>
                                <a class="dropdown-item" href="checkout.html">Checkout</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Pages
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                                <a class="dropdown-item" href="track-order.html">Track Order</a>
                                <a class="dropdown-item" href="invoice.html">Invoice</a>
                                <a class="dropdown-item" href="login.html">Login</a>
                                <a class="dropdown-item" href="/contact-us">Contact Us</a>
                                <a class="dropdown-item" href="/about-us">About Us</a>
                                <a class="dropdown-item" href="register.html">Register</a>
                                <a class="dropdown-item" href="404.html">404</a>
                                <a class="dropdown-item" href="extra.html">Extra :)</a>
                            </div>
                        </li>
                        <li v-if="$page.props.auth" class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img alt="Generic placeholder image" :src="$page.props.user.profile_photo_url" class="nav-osahan-pic rounded-pill"> {{$page.props.auth.name}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
<!--                                <Link :href="route('profile.show')">-->
                                    <a class="dropdown-item" :href="route('profile.show')"><i class="icofont-user"></i> Profile</a>
                                    <Link  :href="route('account')+'#orders'" class="dropdown-item" ><i class="icofont-food-cart"></i> My Account</Link>
<!--                                    <Link  :href="route('account')+'#offers'" class="dropdown-item" ><i class="icofont-food-cart"></i> Offers</Link>-->
<!--                                    <Link  :href="route('account')+'#favourites'" class="dropdown-item" ><i class="icofont-food-cart"></i> Favourites</Link>-->
<!--                                    <Link  :href="route('account')+'#payments'" class="dropdown-item" ><i class="icofont-food-cart"></i> Payments</Link>-->
<!--                                    <Link  :href="route('account')+'#addresses'" class="dropdown-item" ><i class="icofont-food-cart"></i> Addresses</Link>-->
<!--                                <a class="dropdown-item" href="orders.html#addresses"><i class="icofont-location-pin"></i> Log out</a>-->
                                <form @submit.prevent="logout">
                                    <button type="submit" class="dropdown-item" ><i class="icofont-logout"></i> Log out</button>
                                </form>
                            </div>
                        </li>
                        <li v-if="$page.props.auth" class="nav-item dropdown dropdown-cart">
                            <Cart />
                        </li>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<!--                                <i class="fas fa-shopping-basket"></i>-->
                                {{$t("locales."+$page.props.locale)}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                                <a  v-for="lang in this.$page.props.locales" :key="lang" @click="setLocale(lang)" class="dropdown-item" href="#">{{$t("locales."+lang)}}</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!--                                <i class="fas fa-shopping-basket"></i>-->
                                {{$t("currencies."+$page.props.currency)}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
                                <a  v-for="currency in this.$page.props.currencies" :key="currency" @click="setCurrency(currency)" class="dropdown-item" href="#">{{$t("currencies."+currency)}}</a>
                            </div>
                        </li>

                        <li v-if="!$page.props.auth" class="nav-item">
                            <a class="nav-link " :href="route('login')" role="button" >
                                Login
                            </a>
<!--                            <Link  :href="route('login')" class="nav-link">-->
<!--                                Login-->
<!--                            </Link>-->
                        </li>



                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            <slot />
        </main>

        <footer class="pt-4 pb-4 text-center">
            <div class="container">
                <p class="mt-0 mb-0">© Copyright 2020 Osahan Eat. All Rights Reserved</p>
                <small class="mt-0 mb-0"> Made with <i class="fas fa-heart heart-icon text-danger"></i> by
                    <a class="text-danger" target="_blank" href="https://www.instagram.com/iamgurdeeposahan/">Gurdeep Osahan</a> - <a class="text-primary" target="_blank" href="https://askbootstrap.com/">Ask Bootstrap</a>
                </small>
            </div>
        </footer>

    </div>
</template>

