<script setup>
    import { ref } from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import Products from '@/Pages/Store/Products.vue'

    import Orders from '@/Pages/Account/Orders.vue'

    defineProps({
        title: String,
    });

    // const setLocale = (lang) => {
    //     Inertia.post(route('setLocale'),{locale : lang},{
    //         onSuccess : () => window.location.reload()
    //     });
    // };


    // const logout = () => {
    //     Inertia.post(route('logout'));
    // };

</script>

<template>
    <Head :title="title" />
    <section class="section pt-4 pb-4 osahan-account-page">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="osahan-account-page-left shadow-sm bg-white h-100">
                        <div class="border-bottom p-4">
<!--                            <div class="osahan-user text-center">-->
<!--                                <div class="osahan-user-media">-->
<!--                                    <img class="mb-3 rounded-pill shadow-sm mt-1" :src="$page.props.user.profile_photo_url" alt="gurdeep singh osahan">-->
<!--                                    <div class="osahan-user-media-body">-->
<!--                                        <h6 class="mb-2">{{$page.props.auth.name}}</h6>-->
<!--                                        <p class="mb-1">{{$page.props.auth.email}}</p>-->
<!--                                        &lt;!&ndash;                                        <p>iamosahan@gmail.com</p>&ndash;&gt;-->
<!--                                        <a :href="route('profile.show')">-->
<!--                                            <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" ><i class="icofont-ui-edit"></i> {{$t('account.edit_button')}}</a></p>-->
<!--                                        </a>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                        <ul class="nav nav-tabs flex-column border-0 pt-4 pl-4 pb-4" id="myTab" role="tablist">
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link active" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="true"><i class="icofont-food-cart"></i> {{$t('account.menu.orders')}}</a>-->
<!--                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link active" id="products-tab" data-toggle="tab" href="#products" role="tab" aria-controls="products" aria-selected="true"><i class="icofont-food-cart"></i>Products</a>
                            </li>
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" id="offers-tab" data-toggle="tab" href="#offers" role="tab" aria-controls="offers" aria-selected="false"><i class="icofont-sale-discount"></i> {{$t('account.menu.offers')}}</a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" id="favourites-tab" data-toggle="tab" href="#favourites" role="tab" aria-controls="favourites" aria-selected="false"><i class="icofont-heart"></i> {{$t('account.menu.favourites')}}</a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" id="payments-tab" data-toggle="tab" href="#payments" role="tab" aria-controls="payments" aria-selected="false"><i class="icofont-credit-card"></i> {{$t('account.menu.payments')}}</a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" id="addresses-tab" data-toggle="tab" href="#addresses" role="tab" aria-controls="addresses" aria-selected="false"><i class="icofont-location-pin"></i> {{$t('account.menu.addresses')}}</a>-->
<!--                            </li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">
                        <div class="tab-content" id="myTabContent">
<!--                            <Orders />-->
                            <Products />
<!--                            <div class="tab-pane fade" id="favourites" role="tabpanel" aria-labelledby="favourites-tab">-->
<!--                                <h4 class="font-weight-bold mt-0 mb-4">{{$t('account.menu.favourites')}}</h4>-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-4 col-sm-6 mb-4 pb-2">-->
<!--                                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">-->
<!--                                            <div class="list-card-image">-->
<!--                                                <div class="star position-absolute"><span class="badge badge-success"><i class="icofont-star"></i> 3.1 (300+)</span></div>-->
<!--                                                <div class="favourite-heart text-danger position-absolute"><a href="detail.html"><i class="icofont-heart"></i></a></div>-->
<!--                                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>-->
<!--                                                <a href="detail.html">-->
<!--                                                    <img src="img/list/4.png" class="img-fluid item-img">-->
<!--                                                </a>-->
<!--                                            </div>-->
<!--                                            <div class="p-3 position-relative">-->
<!--                                                <div class="list-card-body">-->
<!--                                                    <h6 class="mb-1"><a href="detail.html" class="text-black">Famous Dave's Bar-B-Que-->
<!--                                                    </a>-->
<!--                                                    </h6>-->
<!--                                                    <p class="text-gray mb-3">Vegetarian • Indian • Pure veg</p>-->
<!--                                                    <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="icofont-wall-clock"></i> 15–30 min</span> <span class="float-right text-black-50"> $350 FOR TWO</span></p>-->
<!--                                                </div>-->
<!--                                                <div class="list-card-badge">-->
<!--                                                    <span class="badge badge-danger">OFFER</span> <small> Use Coupon OSAHAN50</small>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4 col-sm-6 mb-4 pb-2">-->
<!--                                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">-->
<!--                                            <div class="list-card-image">-->
<!--                                                <div class="star position-absolute"><span class="badge badge-success"><i class="icofont-star"></i> 3.1 (300+)</span></div>-->
<!--                                                <div class="favourite-heart text-danger position-absolute"><a href="detail.html"><i class="icofont-heart"></i></a></div>-->
<!--                                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>-->
<!--                                                <a href="detail.html">-->
<!--                                                    <img src="img/list/5.png" class="img-fluid item-img">-->
<!--                                                </a>-->
<!--                                            </div>-->
<!--                                            <div class="p-3 position-relative">-->
<!--                                                <div class="list-card-body">-->
<!--                                                    <h6 class="mb-1"><a href="detail.html" class="text-black">Thai Famous Cuisine</a></h6>-->
<!--                                                    <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>-->
<!--                                                    <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="icofont-wall-clock"></i> 30–35 min</span> <span class="float-right text-black-50"> $250 FOR TWO</span></p>-->
<!--                                                </div>-->
<!--                                                <div class="list-card-badge">-->
<!--                                                    <span class="badge badge-success">OFFER</span> <small>65% off</small>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4 col-sm-6 mb-4 pb-2">-->
<!--                                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">-->
<!--                                            <div class="list-card-image">-->
<!--                                                <div class="star position-absolute"><span class="badge badge-success"><i class="icofont-star"></i> 3.1 (300+)</span></div>-->
<!--                                                <div class="favourite-heart text-danger position-absolute"><a href="detail.html"><i class="icofont-heart"></i></a></div>-->
<!--                                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>-->
<!--                                                <a href="detail.html">-->
<!--                                                    <img src="img/list/6.png" class="img-fluid item-img">-->
<!--                                                </a>-->
<!--                                            </div>-->
<!--                                            <div class="p-3 position-relative">-->
<!--                                                <div class="list-card-body">-->
<!--                                                    <h6 class="mb-1"><a href="detail.html" class="text-black">The osahan Restaurant-->
<!--                                                    </a>-->
<!--                                                    </h6>-->
<!--                                                    <p class="text-gray mb-3">North • Hamburgers • Pure veg</p>-->
<!--                                                    <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="icofont-wall-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $500 FOR TWO</span></p>-->
<!--                                                </div>-->
<!--                                                <div class="list-card-badge">-->
<!--                                                    <span class="badge badge-danger">OFFER</span> <small>65% OSAHAN50</small>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4 col-sm-6 mb-4 pb-2">-->
<!--                                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">-->
<!--                                            <div class="list-card-image">-->
<!--                                                <div class="star position-absolute"><span class="badge badge-success"><i class="icofont-star"></i> 3.1 (300+)</span></div>-->
<!--                                                <div class="favourite-heart text-danger position-absolute"><a href="detail.html"><i class="icofont-heart"></i></a></div>-->
<!--                                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>-->
<!--                                                <a href="detail.html">-->
<!--                                                    <img src="img/list/7.png" class="img-fluid item-img">-->
<!--                                                </a>-->
<!--                                            </div>-->
<!--                                            <div class="p-3 position-relative">-->
<!--                                                <div class="list-card-body">-->
<!--                                                    <h6 class="mb-1"><a href="detail.html" class="text-black">Stan's Restaurant-->
<!--                                                    </a>-->
<!--                                                    </h6>-->
<!--                                                    <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>-->
<!--                                                    <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="icofont-wall-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $250 FOR TWO</span></p>-->
<!--                                                </div>-->
<!--                                                <div class="list-card-badge">-->
<!--                                                    <span class="badge badge-danger">OFFER</span> <small>65% Coupon OSAHAN50</small>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4 col-sm-6 mb-4 pb-2">-->
<!--                                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">-->
<!--                                            <div class="list-card-image">-->
<!--                                                <div class="star position-absolute"><span class="badge badge-success"><i class="icofont-star"></i> 3.1 (300+)</span></div>-->
<!--                                                <div class="favourite-heart text-danger position-absolute"><a href="detail.html"><i class="icofont-heart"></i></a></div>-->
<!--                                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>-->
<!--                                                <a href="detail.html">-->
<!--                                                    <img src="img/list/8.png" class="img-fluid item-img">-->
<!--                                                </a>-->
<!--                                            </div>-->
<!--                                            <div class="p-3 position-relative">-->
<!--                                                <div class="list-card-body">-->
<!--                                                    <h6 class="mb-1"><a href="detail.html" class="text-black">Polo Lounge-->
<!--                                                    </a>-->
<!--                                                    </h6>-->
<!--                                                    <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>-->
<!--                                                    <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="icofont-wall-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $250 FOR TWO</span></p>-->
<!--                                                </div>-->
<!--                                                <div class="list-card-badge">-->
<!--                                                    <span class="badge badge-danger">OFFER</span> <small> Coupon OSAHAN50</small>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-4 col-sm-6 mb-4 pb-2">-->
<!--                                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">-->
<!--                                            <div class="list-card-image">-->
<!--                                                <div class="star position-absolute"><span class="badge badge-success"><i class="icofont-star"></i> 3.1 (300+)</span></div>-->
<!--                                                <div class="favourite-heart text-danger position-absolute"><a href="detail.html"><i class="icofont-heart"></i></a></div>-->
<!--                                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>-->
<!--                                                <a href="detail.html">-->
<!--                                                    <img src="img/list/9.png" class="img-fluid item-img">-->
<!--                                                </a>-->
<!--                                            </div>-->
<!--                                            <div class="p-3 position-relative">-->
<!--                                                <div class="list-card-body">-->
<!--                                                    <h6 class="mb-1"><a href="detail.html" class="text-black">Jack Fry's-->
<!--                                                    </a>-->
<!--                                                    </h6>-->
<!--                                                    <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>-->
<!--                                                    <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="icofont-wall-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $250 FOR TWO</span></p>-->
<!--                                                </div>-->
<!--                                                <div class="list-card-badge">-->
<!--                                                    <span class="badge badge-danger">OFFER</span> <small>65% </small>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-12 text-center load-more">-->
<!--                                        <button class="btn btn-primary" type="button" disabled>-->
<!--                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>-->
<!--                                            Loading...-->
<!--                                        </button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <Payments />-->
<!--                            <Addresses />-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section pt-5 pb-5 text-center bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="m-0">Operate food store or restaurants? <a href="/login">Work With Us</a></h5>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
</template>
