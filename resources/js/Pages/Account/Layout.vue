<script>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";
import Orders from "@/Pages/Account/Orders.vue";
import Offers from "@/Pages/Account/Offers.vue";
import Payments from "@/Pages/Account/Payments.vue";
import Addresses from "@/Pages/Account/Addresses.vue";
import OrderCard from "@/Pages/Account/Order/OrderCard.vue";
import AddressCard from "@/Pages/Account/Address/AddressCard.vue";
import addAddress from "@/Pages/Account/Address/addAddress.vue";
import DeleteUserForm from "@/Pages/Profile/Partials/DeleteUserForm.vue";
import LogoutOtherBrowserSessionsForm from "@/Pages/Profile/Partials/LogoutOtherBrowserSessionsForm.vue";
import SectionBorder from "@/Components/SectionBorder.vue";
import TwoFactorAuthenticationForm from "@/Pages/Profile/Partials/TwoFactorAuthenticationForm.vue";
import UpdatePasswordForm from "@/Pages/Profile/Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "@/Pages/Profile/Partials/UpdateProfileInformationForm.vue";
import Details from "@/Pages/Account/Details.vue";

import $ from "jquery";

export default {
  props: ["title"],
  components: {
    OrderCard,
    Addresses,
    Payments,
    Offers,
    Orders,
    Link,
    Head,
    AddressCard,
    addAddress,
    UpdateProfileInformationForm,
    DeleteUserForm,
    LogoutOtherBrowserSessionsForm,
    SectionBorder,
    TwoFactorAuthenticationForm,
    UpdatePasswordForm,
    Details,
  },
  data() {
    return {
      orders: this.$page.props.orders,
      confirmsTwoFactorAuthentication: this.$page.props.confirmsTwoFactorAuthentication,
      sessions: this.$page.props.sessions,
    };
  },
  methods: {
    loadOrders: function () {
      let app = this;
      Inertia.get(
        route("account"),
        {
          count: app.orders.length + 2,
        },
        {
          preserveScroll: true,
          onSuccess: (res) => {
            console.log(res.props.orders);
            app.orders = res.props.orders;
            $("#liton_tab_1_2").addClass("active show");
          },
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
  },
};
</script>

<template>
  <div class="liton__wishlist-area pb-80">
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
                      <a class="active show" data-toggle="tab" href="#liton_tab_1_1"
                        >{{ $t("account.menu.dashboard") }} <i class="fas fa-home"></i
                      ></a>
                      <a data-toggle="tab" href="#liton_tab_1_2"
                        >{{ $t("account.menu.orders") }} <i class="fas fa-file-alt"></i
                      ></a>
                      <!--                                            <a data-toggle="tab" href="#liton_tab_1_3">Downloads <i class="fas fa-arrow-down"></i></a>-->
                      <a data-toggle="tab" href="#liton_tab_1_4"
                        >{{ $t("account.menu.addresses") }}
                        <i class="fas fa-map-marker-alt"></i
                      ></a>
                      <a data-toggle="tab" href="#liton_tab_1_5"
                        >{{ $t("account.menu.details") }} <i class="fas fa-user"></i
                      ></a>
                      <a @click="logout()" href="javascript:void(0)"
                        >{{ $t("nav_menu.pages.logout") }}
                        <i class="fas fa-sign-out-alt"></i
                      ></a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="tab-content">
                    <div class="tab-pane fade active show" id="liton_tab_1_1">
                      <div class="ltn__myaccount-tab-content-inner">
                        <p v-if="$page.props.auth">
                          {{ $t("account.hello") }}
                          <strong>{{ $page.props.auth.name }}</strong>
                        </p>
                        <p>
                          {{ $t("account.dashboard.desc") }}
                        </p>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="liton_tab_1_2">
                      <div class="ltn__myaccount-tab-content-inner">
                        <OrderCard
                          v-for="model in orders"
                          :key="model.id"
                          :model="model"
                        />
                        <CENTER
                          ><button @click="loadOrders()" class="theme-btn-1 btn">
                            {{ $t("account.load_more") }}
                          </button></CENTER
                        >
                      </div>
                    </div>
                    <div class="tab-pane fade" id="liton_tab_1_4">
                      <div class="ltn__myaccount-tab-content-inner">
                        <p>
                          {{ $t("account.addresses.desc") }}
                        </p>
                        <h4 class="float-right">
                          <a
                            class="btn theme-btn-1"
                            data-toggle="modal"
                            data-target="#add-address-modal"
                            href="#"
                            ><i class="icofont-ui-add"></i>
                            {{ $t("account.addresses.add_button") }}</a
                          >
                        </h4>
                        <!-- Modal -->
                        <addAddress />
                        <div class="row col-12">
                          <AddressCard
                            v-for="(model, index) in $page.props.addresses"
                            :key="model.id"
                            :model="model"
                          />
                        </div>
                      </div>
                    </div>
                    <Details />
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
<style scoped></style>
