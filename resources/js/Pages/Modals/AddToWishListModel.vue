<template>
  <!-- MODAL AREA START (Wishlist Modal) -->
  <div class="ltn__modal-area ltn__add-to-cart-modal-area">
    <div class="modal fade" id="liton_wishlist_modal" tabindex="-1">
      <div
        v-if="$page.props.auth && $page.props.productTo"
        :key="$page.props.productTo.id"
        class="modal-dialog modal-md"
        role="document"
      >
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="ltn__quick-view-modal-inner">
              <div class="modal-product-item">
                <div class="row">
                  <div class="col-12">
                    <div class="modal-product-img">
                      <img :src="$page.props.productTo.fimage" alt="#" />
                    </div>
                    <div class="modal-product-info">
                      <h5>
                        <Link
                          :href="$page.props.productTo.surl"
                          >{{ $page.props.productTo.lname }}</Link
                        >
                      </h5>
                      <p class="added-cart">
                        <span
                          v-if="form.processing"
                          class="spinner-grow spinner-grow-md"
                          role="status"
                          aria-hidden="true"
                        ></span>
                        <i v-if="!form.processing" class="fa fa-check-circle"></i>
                        {{ $t("listing.success_added_wishlist") }}
                      </p>
                      <div class="btn-wrapper">
                        <a
                          @click="go('wishlist.index')"
                          href="javascript: void(0)"
                          class="theme-btn-1 btn btn-effect-1"
                          >{{ $t("listing.view_wishlist") }}</a
                        >
                      </div>
                    </div>
                    <!-- additional-info -->
                    <div class="additional-info d-none">
                      <p>
                        We want to give you <b>10% discount</b> for your first order,
                        <br />
                        Use discount code at checkout
                      </p>
                      <div class="payment-method">
                        <img src="/img/icons/payment.png" alt="#" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div v-else class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="ltn__quick-view-modal-inner">
              <div>
                <div class="account-login-inner">
                  <div
                    class="go-to-btn mt-20 d-flex align-items-center justify-content-center"
                  >
                    <a @click="isLogin = !isLogin" href="javascript: void(0)"
                      ><small
                        >{{
                          isLogin
                            ? $t("login.dont_have_account")
                            : $t("login.have_account")
                        }}
                        ?</small
                      ></a
                    >
                  </div>
                  <form
                    v-if="isLogin"
                    @submit.prevent="login($page.props.productTo)"
                    action="#"
                    class="ltn__form-box contact-form-box"
                  >
                    <input
                      v-model="loginForm.email"
                      autofocus
                      type="email"
                      id="inputEmail"
                      required
                      class="form-control"
                      :placeholder="$t('login.email')"
                    />
                    <div v-show="loginForm.errors.email">
                      <p class="text-sm text-red-600" style="color: red">
                        {{ loginForm.errors.email }}
                      </p>
                    </div>
                    <input
                      v-model="loginForm.password"
                      required
                      type="password"
                      id="inputPassword"
                      class="form-control"
                      :placeholder="$t('login.password')"
                    />
                    <div v-show="loginForm.errors.password">
                      <p class="text-sm text-red-600" style="color: red">
                        {{ loginForm.errors.password }}
                      </p>
                    </div>
                    <div class="btn-wrapper mt-0">
                      <button
                        :class="{ 'opacity-25': loginForm.processing }"
                        :disabled="loginForm.processing"
                        class="theme-btn-1 btn btn-block"
                        type="submit"
                      >
                        {{ $t("login.login") }}
                      </button>
                    </div>
                    <!--                                        <div class="go-to-btn mt-20">-->
                    <!--                                            <a href="#"><small>FORGOTTEN YOUR PASSWORD?</small></a>-->
                    <!--                                        </div>-->
                  </form>
                  <form
                    v-else
                    @submit.prevent="register($page.props.productTo)"
                    class="ltn__form-box contact-form-box"
                  >
                    <input
                      v-model="registerForm.name"
                      type="text"
                      id="inputName"
                      class="form-control"
                      :placeholder="$t('register.name')"
                    />
                    <div v-show="registerForm.errors.name">
                      <p class="text-sm" style="color: red">
                        {{ registerForm.errors.name }}
                      </p>
                    </div>
                    <input
                      v-model="registerForm.email"
                      type="email"
                      id="inputEmail"
                      class="form-control"
                      :placeholder="$t('register.email')"
                    />
                    <div v-show="registerForm.errors.email">
                      <p class="text-sm text-red-600" style="color: red">
                        {{ registerForm.errors.email }}
                      </p>
                    </div>
                    <input
                      v-model="registerForm.password"
                      type="password"
                      id="inputPassword"
                      class="form-control"
                      :placeholder="$t('register.password')"
                    />
                    <div v-show="registerForm.errors.password">
                      <p class="text-sm text-red-600" style="color: red">
                        {{ registerForm.errors.password }}
                      </p>
                    </div>
                    <input
                      v-model="registerForm.password_confirmation"
                      type="password"
                      id="inputPasswordCofirmation"
                      class="form-control"
                      :placeholder="$t('register.password_confirmation')"
                    />
                    <div v-show="registerForm.errors.password_confirmation">
                      <p class="text-sm text-red-600">
                        {{ registerForm.errors.password_confirmation }}
                      </p>
                    </div>
                    <label class="checkbox-inline">
                      <input type="checkbox" value="" />
                      {{ $t("register.checkbox1") }}
                    </label>
                    <label class="checkbox-inline">
                      <input type="checkbox" value="" />
                      {{ $t("register.checkbox2") }}
                    </label>
                    <div class="btn-wrapper">
                      <button
                        :class="{ 'opacity-25': registerForm.processing }"
                        :disabled="form.processing"
                        class="theme-btn-1 btn reverse-color btn-block"
                        type="submit"
                      >
                        {{ $t("register.sign_up") }}
                      </button>
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
  <!-- MODAL AREA END -->
</template>

<script>
import { useToast } from "vue-toastification";
import { useForm, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {
    Link,
  },
  data() {
    return {
      liton_wishlist_modal: $("#liton_wishlist_modal"),
      registerForm: useForm({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        terms: false,
      }),
      isLogin: true,
      form: useForm({}),
      loginForm: useForm({
        email: "",
        password: "",
        remember: false,
      }),
      product: this.$page.props.productTo,
    };
  },
  mounted() {
    let app = this;
    let liton_wishlist_modal = $("#liton_wishlist_modal");

    liton_wishlist_modal.on("shown.bs.modal", function (e) {
      if (app.$page.props.auth) app.submit(app.$page.props.productTo);
    });
  },
  methods: {
    login: function (model) {
      let app = this;
      this.loginForm
        .transform((data) => ({
          ...data,
          remember: app.loginForm.remember ? "on" : "",
          wishlist: true,
        }))
        .post(this.route("login"), {
          onFinish: () => {
            app.loginForm.reset("password");
            app.$page.props.productTo = model;
          },
          onSuccess: () => {
            app.$page.props.productTo = model;
            app.submit(app.$page.props.productTo);
          },
          preserveScroll: true,
        });
    },
    register: function (model) {
      let app = this;
      this.registerForm
        .transform((data) => ({
          ...data,
          wishlist: true,
        }))
        .post(this.route("register"), {
          onFinish: () => {
            app.registerForm.reset("password", "password_confirmation");
            app.$page.props.productTo = model;
          },
          onSuccess: () => {
            app.$page.props.productTo = model;
            app.submit(app.$page.props.productTo);
          },
          preserveScroll: true,
        });
    },
    submit: function (model) {
      let app = this;
      this.form
        .transform((data) => ({
          product_id: model.id,
        }))
        .post(route("wishlist.store"), {
          onSuccess: function () {
            if (app.$page.props.product && app.$page.props.product.id === model.id)
              app.$page.props.productTo = app.$page.props.product;
            else app.$page.props.productTo = model;
          },
        });
    },
    submitD(item) {
      Inertia.delete(
        route("cartitem.destroy", {
          id: item.id,
        }),
        {
          onSuccess: (res) => {},
        }
      );
    },
    Pay() {
      this.$emit("Pay");
    },
    go(route) {
      $("#liton_wishlist_modal").modal("hide");
      $("body").removeClass("modal-open");
      $(".modal-backdrop").remove();
      Inertia.visit(this.route(route));
    },
  },
};
</script>
