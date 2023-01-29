<template>
  <GuestLayout :title="$t('track_order.track_order')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("track_order.track_order") }}
      </h2>
    </template>

    <!-- BREADCRUMB AREA START -->
    <breadcrumb :title="$t('track_order.track_order')" />
    <!-- BREADCRUMB AREA END -->

    <!-- LOGIN AREA START -->
    <div class="ltn__login-area margin-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="account-login-inner section-bg-1">
              <div class="ltn__form-box contact-form-box">
                <p class="text-center">{{ $t("track_order.desc") }}</p>
                <div v-for="error in $page.props.errors">
                  <p class="text-center text-danger">{{ $t(error) }}.</p>
                </div>
                <label>{{ $t("track_order.order") }}</label>
                <input
                  v-model="form.order_id"
                  type="text"
                  name="order_id"
                  :placeholder="$t('track_order.id_label')"
                />
                <div v-if="this.submited && !orderId">
                  <p class="text-sm" style="color: red">
                    {{ errorsd.order_id }}
                  </p>
                </div>
                <label>{{ $t("track_order.mobile") }}</label>
                <input
                  v-model="form.mobile"
                  type="text"
                  name="mobile"
                  :placeholder="$t('track_order.mobile_label')"
                />
                <div v-if="this.submited && !isPhone">
                  <p class="text-sm" style="color: red">
                    {{ errorsd.mobile }}
                  </p>
                </div>
                <div class="btn-wrapper mt-0 text-center">
                  <button
                    @click="submit()"
                    class="btn theme-btn-1 btn-effect-1 text-uppercase"
                    type="button"
                  >
                    {{ $t("track_order.track_order") }}
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- LOGIN AREA END -->
  </GuestLayout>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  props: ["errors"],
  components: {
    breadcrumb,
    GuestLayout,
  },
  data() {
    return {
      form: useForm({
        order_id: "",
        mobile: "",
      }),
      errorsd: {
        mobile: this.$t("errors.correct_field"),
        order_id: this.$t("errors.correct_field"),
      },
      submited: false,
    };
  },
  methods: {
    submit: function () {
      this.submited = !(this.orderId && this.isPhone);
      if (this.orderId && this.isPhone)
        this.form.post(this.route("trackOrder.redirect"), {
          preserveScroll: true,
        });
    },
  },
  computed: {
    orderId: function () {
      let reg = /^\d+$/;
      return this.form.order_id.match(reg);
    },
    emailReg: function () {
      return String(this.form.email)
        .toLowerCase()
        .match(
          /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
    },
    isPhone: function () {
      return this.form.mobile.match(
        /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/g
      );
    },
  },
};
</script>
<style scoped>
@media only screen and (min-width: 800px) {
  .margin-section {
    margin-bottom: 80px;
  }
}
@media only screen and (max-width: 600px) {
  .margin-section {
    margin-bottom: 40px;
  }
}
</style>
