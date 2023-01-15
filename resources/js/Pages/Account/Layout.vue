<script >
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Orders from "@/Pages/Account/Orders.vue";
import Offers from "@/Pages/Account/Offers.vue";
import Payments from "@/Pages/Account/Payments.vue";
import Addresses from "@/Pages/Account/Addresses.vue";
import OrderCard from "@/Pages/Account/Order/OrderCard.vue";
import $ from 'jquery'

export default  {
    props : ['title'],
    components : {
        OrderCard,
        Addresses,
        Payments,
        Offers,
        Orders,
        Link,
        Head
    },
    data (){
        return {
            orders : this.$page.props.orders
        }
    },
    methods : {
        loadOrders : function (){
            let app = this;
            Inertia.get(route('account'),{
                count : app.orders.length +2
            },{
                preserveScroll : true,
                onSuccess : (res) => {
                    console.log(res.props.orders);
                    app.orders = res.props.orders;
                    $('#liton_tab_1_2').addClass('active show');
                }
            });
        }

    }
}

</script>

<template>
  <Head :title="title" />
<!--  <section class="section pt-4 pb-4 osahan-account-page">-->
<!--    <div class="container">-->
<!--      <div class="row">-->
<!--        <div class="col-md-3">-->
<!--          <div class="osahan-account-page-left shadow-sm bg-white h-100">-->
<!--            <div class="border-bottom p-4">-->
<!--              <div class="osahan-user text-center">-->
<!--                <div class="osahan-user-media">-->
<!--                  <img-->
<!--                    class="mb-3 rounded-pill shadow-sm mt-1"-->
<!--                    :src="$page.props.user.profile_photo_url"-->
<!--                    alt="gurdeep singh osahan"-->
<!--                  />-->
<!--                  <div class="osahan-user-media-body">-->
<!--                    <h6 class="mb-2">{{ $page.props.auth.name }}</h6>-->
<!--                    <p class="mb-1">{{ $page.props.auth.email }}</p>-->
<!--                    &lt;!&ndash;                                        <p>iamosahan@gmail.com</p>&ndash;&gt;-->
<!--                    <a :href="route('profile.show')">-->
<!--                      <p class="mb-0 text-black font-weight-bold">-->
<!--                        <a class="text-primary mr-3"-->
<!--                          ><i class="icofont-ui-edit"></i>-->
<!--                          {{ $t("account.edit_button") }}</a-->
<!--                        >-->
<!--                      </p>-->
<!--                    </a>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
<!--            <ul-->
<!--              class="nav nav-tabs flex-column border-0 pt-4 pl-4 pb-4"-->
<!--              id="myTab"-->
<!--              role="tablist"-->
<!--            >-->
<!--              <li class="nav-item">-->
<!--                <a-->
<!--                  class="nav-link active"-->
<!--                  id="orders-tab"-->
<!--                  data-toggle="tab"-->
<!--                  href="#orders"-->
<!--                  role="tab"-->
<!--                  aria-controls="orders"-->
<!--                  aria-selected="true"-->
<!--                  ><i class="icofont-food-cart"></i> {{ $t("account.menu.orders") }}</a-->
<!--                >-->
<!--              </li>-->
<!--              &lt;!&ndash; <li class="nav-item">-->
<!--                                <a class="nav-link" id="offers-tab" data-toggle="tab" href="#offers" role="tab" aria-controls="offers" aria-selected="false"><i class="icofont-sale-discount"></i> {{$t('account.menu.offers')}}</a>-->
<!--                            </li>-->
<!--                            <li class="nav-item">-->
<!--                                <a class="nav-link" id="favourites-tab" data-toggle="tab" href="#favourites" role="tab" aria-controls="favourites" aria-selected="false"><i class="icofont-heart"></i> {{$t('account.menu.favourites')}}</a>-->
<!--                            </li> &ndash;&gt;-->
<!--              <li class="nav-item">-->
<!--                <a-->
<!--                  class="nav-link"-->
<!--                  id="payments-tab"-->
<!--                  data-toggle="tab"-->
<!--                  href="#payments"-->
<!--                  role="tab"-->
<!--                  aria-controls="payments"-->
<!--                  aria-selected="false"-->
<!--                  ><i class="icofont-credit-card"></i>-->
<!--                  {{ $t("account.menu.payments") }}</a-->
<!--                >-->
<!--              </li>-->
<!--              <li class="nav-item">-->
<!--                <a-->
<!--                  class="nav-link"-->
<!--                  id="addresses-tab"-->
<!--                  data-toggle="tab"-->
<!--                  href="#addresses"-->
<!--                  role="tab"-->
<!--                  aria-controls="addresses"-->
<!--                  aria-selected="false"-->
<!--                  ><i class="icofont-location-pin"></i>-->
<!--                  {{ $t("account.menu.addresses") }}</a-->
<!--                >-->
<!--              </li>-->
<!--            </ul>-->
<!--          </div>-->
<!--        </div>-->
<!--        <div class="col-md-9">-->
<!--          <div class="osahan-account-page-right shadow-sm bg-white p-4 h-100">-->
<!--            <div class="tab-content" id="myTabContent">-->
<!--              <Orders />-->
<!--              <Offers />-->
<!--              <div-->
<!--                class="tab-pane fade"-->
<!--                id="favourites"-->
<!--                role="tabpanel"-->
<!--                aria-labelledby="favourites-tab"-->
<!--              >-->
<!--                <h4 class="font-weight-bold mt-0 mb-4">-->
<!--                  {{ $t("account.menu.favourites") }}-->
<!--                </h4>-->
<!--                <div class="row">-->
<!--                  <div class="col-md-4 col-sm-6 mb-4 pb-2">-->
<!--                    <div-->
<!--                      class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"-->
<!--                    >-->
<!--                      <div class="list-card-image">-->
<!--                        <div class="star position-absolute">-->
<!--                          <span class="badge badge-success"-->
<!--                            ><i class="icofont-star"></i> 3.1 (300+)</span-->
<!--                          >-->
<!--                        </div>-->
<!--                        <div class="favourite-heart text-danger position-absolute">-->
<!--                          <a href="detail.html"><i class="icofont-heart"></i></a>-->
<!--                        </div>-->
<!--                        <div class="member-plan position-absolute">-->
<!--                          <span class="badge badge-dark">Promoted</span>-->
<!--                        </div>-->
<!--                        <a href="detail.html">-->
<!--                          <img src="img/list/4.png" class="img-fluid item-img" />-->
<!--                        </a>-->
<!--                      </div>-->
<!--                      <div class="p-3 position-relative">-->
<!--                        <div class="list-card-body">-->
<!--                          <h6 class="mb-1">-->
<!--                            <a href="detail.html" class="text-black"-->
<!--                              >Famous Dave's Bar-B-Que-->
<!--                            </a>-->
<!--                          </h6>-->
<!--                          <p class="text-gray mb-3">Vegetarian • Indian • Pure veg</p>-->
<!--                          <p class="text-gray mb-3 time">-->
<!--                            <span-->
<!--                              class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"-->
<!--                              ><i class="icofont-wall-clock"></i> 15–30 min</span-->
<!--                            >-->
<!--                            <span class="float-right text-black-50"> $350 FOR TWO</span>-->
<!--                          </p>-->
<!--                        </div>-->
<!--                        <div class="list-card-badge">-->
<!--                          <span class="badge badge-danger">OFFER</span>-->
<!--                          <small> Use Coupon OSAHAN50</small>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div class="col-md-4 col-sm-6 mb-4 pb-2">-->
<!--                    <div-->
<!--                      class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"-->
<!--                    >-->
<!--                      <div class="list-card-image">-->
<!--                        <div class="star position-absolute">-->
<!--                          <span class="badge badge-success"-->
<!--                            ><i class="icofont-star"></i> 3.1 (300+)</span-->
<!--                          >-->
<!--                        </div>-->
<!--                        <div class="favourite-heart text-danger position-absolute">-->
<!--                          <a href="detail.html"><i class="icofont-heart"></i></a>-->
<!--                        </div>-->
<!--                        <div class="member-plan position-absolute">-->
<!--                          <span class="badge badge-dark">Promoted</span>-->
<!--                        </div>-->
<!--                        <a href="detail.html">-->
<!--                          <img src="img/list/5.png" class="img-fluid item-img" />-->
<!--                        </a>-->
<!--                      </div>-->
<!--                      <div class="p-3 position-relative">-->
<!--                        <div class="list-card-body">-->
<!--                          <h6 class="mb-1">-->
<!--                            <a href="detail.html" class="text-black"-->
<!--                              >Thai Famous Cuisine</a-->
<!--                            >-->
<!--                          </h6>-->
<!--                          <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>-->
<!--                          <p class="text-gray mb-3 time">-->
<!--                            <span-->
<!--                              class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"-->
<!--                              ><i class="icofont-wall-clock"></i> 30–35 min</span-->
<!--                            >-->
<!--                            <span class="float-right text-black-50"> $250 FOR TWO</span>-->
<!--                          </p>-->
<!--                        </div>-->
<!--                        <div class="list-card-badge">-->
<!--                          <span class="badge badge-success">OFFER</span>-->
<!--                          <small>65% off</small>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div class="col-md-4 col-sm-6 mb-4 pb-2">-->
<!--                    <div-->
<!--                      class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"-->
<!--                    >-->
<!--                      <div class="list-card-image">-->
<!--                        <div class="star position-absolute">-->
<!--                          <span class="badge badge-success"-->
<!--                            ><i class="icofont-star"></i> 3.1 (300+)</span-->
<!--                          >-->
<!--                        </div>-->
<!--                        <div class="favourite-heart text-danger position-absolute">-->
<!--                          <a href="detail.html"><i class="icofont-heart"></i></a>-->
<!--                        </div>-->
<!--                        <div class="member-plan position-absolute">-->
<!--                          <span class="badge badge-dark">Promoted</span>-->
<!--                        </div>-->
<!--                        <a href="detail.html">-->
<!--                          <img src="img/list/6.png" class="img-fluid item-img" />-->
<!--                        </a>-->
<!--                      </div>-->
<!--                      <div class="p-3 position-relative">-->
<!--                        <div class="list-card-body">-->
<!--                          <h6 class="mb-1">-->
<!--                            <a href="detail.html" class="text-black"-->
<!--                              >The osahan Restaurant-->
<!--                            </a>-->
<!--                          </h6>-->
<!--                          <p class="text-gray mb-3">North • Hamburgers • Pure veg</p>-->
<!--                          <p class="text-gray mb-3 time">-->
<!--                            <span-->
<!--                              class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"-->
<!--                              ><i class="icofont-wall-clock"></i> 15–25 min</span-->
<!--                            >-->
<!--                            <span class="float-right text-black-50"> $500 FOR TWO</span>-->
<!--                          </p>-->
<!--                        </div>-->
<!--                        <div class="list-card-badge">-->
<!--                          <span class="badge badge-danger">OFFER</span>-->
<!--                          <small>65% OSAHAN50</small>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div class="col-md-4 col-sm-6 mb-4 pb-2">-->
<!--                    <div-->
<!--                      class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"-->
<!--                    >-->
<!--                      <div class="list-card-image">-->
<!--                        <div class="star position-absolute">-->
<!--                          <span class="badge badge-success"-->
<!--                            ><i class="icofont-star"></i> 3.1 (300+)</span-->
<!--                          >-->
<!--                        </div>-->
<!--                        <div class="favourite-heart text-danger position-absolute">-->
<!--                          <a href="detail.html"><i class="icofont-heart"></i></a>-->
<!--                        </div>-->
<!--                        <div class="member-plan position-absolute">-->
<!--                          <span class="badge badge-dark">Promoted</span>-->
<!--                        </div>-->
<!--                        <a href="detail.html">-->
<!--                          <img src="img/list/7.png" class="img-fluid item-img" />-->
<!--                        </a>-->
<!--                      </div>-->
<!--                      <div class="p-3 position-relative">-->
<!--                        <div class="list-card-body">-->
<!--                          <h6 class="mb-1">-->
<!--                            <a href="detail.html" class="text-black"-->
<!--                              >Stan's Restaurant-->
<!--                            </a>-->
<!--                          </h6>-->
<!--                          <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>-->
<!--                          <p class="text-gray mb-3 time">-->
<!--                            <span-->
<!--                              class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"-->
<!--                              ><i class="icofont-wall-clock"></i> 15–25 min</span-->
<!--                            >-->
<!--                            <span class="float-right text-black-50"> $250 FOR TWO</span>-->
<!--                          </p>-->
<!--                        </div>-->
<!--                        <div class="list-card-badge">-->
<!--                          <span class="badge badge-danger">OFFER</span>-->
<!--                          <small>65% Coupon OSAHAN50</small>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div class="col-md-4 col-sm-6 mb-4 pb-2">-->
<!--                    <div-->
<!--                      class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"-->
<!--                    >-->
<!--                      <div class="list-card-image">-->
<!--                        <div class="star position-absolute">-->
<!--                          <span class="badge badge-success"-->
<!--                            ><i class="icofont-star"></i> 3.1 (300+)</span-->
<!--                          >-->
<!--                        </div>-->
<!--                        <div class="favourite-heart text-danger position-absolute">-->
<!--                          <a href="detail.html"><i class="icofont-heart"></i></a>-->
<!--                        </div>-->
<!--                        <div class="member-plan position-absolute">-->
<!--                          <span class="badge badge-dark">Promoted</span>-->
<!--                        </div>-->
<!--                        <a href="detail.html">-->
<!--                          <img src="img/list/8.png" class="img-fluid item-img" />-->
<!--                        </a>-->
<!--                      </div>-->
<!--                      <div class="p-3 position-relative">-->
<!--                        <div class="list-card-body">-->
<!--                          <h6 class="mb-1">-->
<!--                            <a href="detail.html" class="text-black">Polo Lounge </a>-->
<!--                          </h6>-->
<!--                          <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>-->
<!--                          <p class="text-gray mb-3 time">-->
<!--                            <span-->
<!--                              class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"-->
<!--                              ><i class="icofont-wall-clock"></i> 15–25 min</span-->
<!--                            >-->
<!--                            <span class="float-right text-black-50"> $250 FOR TWO</span>-->
<!--                          </p>-->
<!--                        </div>-->
<!--                        <div class="list-card-badge">-->
<!--                          <span class="badge badge-danger">OFFER</span>-->
<!--                          <small> Coupon OSAHAN50</small>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div class="col-md-4 col-sm-6 mb-4 pb-2">-->
<!--                    <div-->
<!--                      class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"-->
<!--                    >-->
<!--                      <div class="list-card-image">-->
<!--                        <div class="star position-absolute">-->
<!--                          <span class="badge badge-success"-->
<!--                            ><i class="icofont-star"></i> 3.1 (300+)</span-->
<!--                          >-->
<!--                        </div>-->
<!--                        <div class="favourite-heart text-danger position-absolute">-->
<!--                          <a href="detail.html"><i class="icofont-heart"></i></a>-->
<!--                        </div>-->
<!--                        <div class="member-plan position-absolute">-->
<!--                          <span class="badge badge-dark">Promoted</span>-->
<!--                        </div>-->
<!--                        <a href="detail.html">-->
<!--                          <img src="img/list/9.png" class="img-fluid item-img" />-->
<!--                        </a>-->
<!--                      </div>-->
<!--                      <div class="p-3 position-relative">-->
<!--                        <div class="list-card-body">-->
<!--                          <h6 class="mb-1">-->
<!--                            <a href="detail.html" class="text-black">Jack Fry's </a>-->
<!--                          </h6>-->
<!--                          <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>-->
<!--                          <p class="text-gray mb-3 time">-->
<!--                            <span-->
<!--                              class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"-->
<!--                              ><i class="icofont-wall-clock"></i> 15–25 min</span-->
<!--                            >-->
<!--                            <span class="float-right text-black-50"> $250 FOR TWO</span>-->
<!--                          </p>-->
<!--                        </div>-->
<!--                        <div class="list-card-badge">-->
<!--                          <span class="badge badge-danger">OFFER</span>-->
<!--                          <small>65% </small>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                  <div class="col-md-12 text-center load-more">-->
<!--                    <button class="btn btn-primary" type="button" disabled>-->
<!--                      <span-->
<!--                        class="spinner-grow spinner-grow-sm"-->
<!--                        role="status"-->
<!--                        aria-hidden="true"-->
<!--                      ></span>-->
<!--                      {{ $t("listing.loading") }}...-->
<!--                    </button>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--              <Payments />-->
<!--              <Addresses />-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </section>-->
    <div class="liton__wishlist-area pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- PRODUCT TAB AREA START -->
                    <div class="ltn__product-tab-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="ltn__tab-menu-list">
                                        <div class="nav">
                                            <a  class="active show" data-toggle="tab" href="#liton_tab_1_1">Dashboard <i class="fas fa-home"></i></a>
                                            <a  data-toggle="tab" href="#liton_tab_1_2">Orders <i class="fas fa-file-alt"></i></a>
                                            <a data-toggle="tab" href="#liton_tab_1_3">Downloads <i class="fas fa-arrow-down"></i></a>
                                            <a data-toggle="tab" href="#liton_tab_1_4">address <i class="fas fa-map-marker-alt"></i></a>
                                            <a data-toggle="tab" href="#liton_tab_1_5">Account Details <i class="fas fa-user"></i></a>
                                            <a href="login.html">Logout <i class="fas fa-sign-out-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="liton_tab_1_1">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <p>Hello <strong>UserName</strong> (not <strong>UserName</strong>? <small><a href="login-register.html">Log out</a></small> )</p>
                                                <p>From your account dashboard you can view your <span>recent orders</span>, manage your <span>shipping and billing addresses</span>, and <span>edit your password and account details</span>.</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="liton_tab_1_2">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <OrderCard v-for="model in orders" :key="model.id" :model="model" />
                                                <CENTER><button @click="loadOrders()" class="theme-btn-1 btn ">Load more</button></CENTER>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="liton_tab_1_3">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Date</th>
                                                            <th>Expire</th>
                                                            <th>Download</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Carsafe - Car Service PSD Template</td>
                                                            <td>Nov 22, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Carsafe - Car Service HTML Template</td>
                                                            <td>Nov 10, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Carsafe - Car Service WordPress Theme</td>
                                                            <td>Nov 12, 2020</td>
                                                            <td>Yes</td>
                                                            <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="liton_tab_1_4">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <p>The following addresses will be used on the checkout page by default.</p>
                                                <div class="row">
                                                    <div class="col-md-6 col-12 learts-mb-30">
                                                        <h4>Billing Address <small><a href="#">edit</a></small></h4>
                                                        <address>
                                                            <p><strong>Alex Tuntuni</strong></p>
                                                            <p>1355 Market St, Suite 900 <br>
                                                                San Francisco, CA 94103</p>
                                                            <p>Mobile: (123) 456-7890</p>
                                                        </address>
                                                    </div>
                                                    <div class="col-md-6 col-12 learts-mb-30">
                                                        <h4>Shipping Address <small><a href="#">edit</a></small></h4>
                                                        <address>
                                                            <p><strong>Alex Tuntuni</strong></p>
                                                            <p>1355 Market St, Suite 900 <br>
                                                                San Francisco, CA 94103</p>
                                                            <p>Mobile: (123) 456-7890</p>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="liton_tab_1_5">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <p>The following addresses will be used on the checkout page by default.</p>
                                                <div class="ltn__form-box">
                                                    <form action="#">
                                                        <div class="row mb-50">
                                                            <div class="col-md-6">
                                                                <label>First name:</label>
                                                                <input type="text" name="ltn__name">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Last name:</label>
                                                                <input type="text" name="ltn__lastname">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Display Name:</label>
                                                                <input type="text" name="ltn__lastname" placeholder="Ethan">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Display Email:</label>
                                                                <input type="email" name="ltn__lastname" placeholder="example@example.com">
                                                            </div>
                                                        </div>
                                                        <fieldset>
                                                            <legend>Password change</legend>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label>Current password (leave blank to leave unchanged):</label>
                                                                    <input type="password" name="ltn__name">
                                                                    <label>New password (leave blank to leave unchanged):</label>
                                                                    <input type="password" name="ltn__lastname">
                                                                    <label>Confirm new password:</label>
                                                                    <input type="password" name="ltn__lastname">
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="btn-wrapper">
                                                            <button type="submit" class="btn theme-btn-1 btn-effect-1 text-uppercase">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PRODUCT TAB AREA END -->
                </div>
            </div>
        </div>
    </div>
</template>
