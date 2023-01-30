<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  props: ["title", "img"],
  components: {
    Head,
    Link,
  },
  methods: {
    go: function () {
      let app = this;
      Inertia.post(
        this.route("trackOrder.redirect", {
          mobile: app.$page.props.buyer.mobile,
          order_id: app.$page.props.buyer.order_id,
        })
      );
    },
  },
};
</script>

<template>
  <!-- BREADCRUMB AREA START -->
  <div
    class="ltn__breadcrumb-area ltn__breadcrumb-area-4 bg-overlay-theme-10--- bg-image margin-section"
  >
    <!-- :data-bg="img" -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div
            class="ltn__breadcrumb-inner ltn__breadcrumb-inner-4 justify-content-between"
          >
            <div class="section-title-area">
              <h1 class="section-title white-color">{{ title }}</h1>
            </div>
            <div class="ltn__breadcrumb-list">
              <ul>
                <li>
                  <Link href="/">{{ $t("nav_menu.pages.home") }}</Link>
                </li>
                <li>{{ title }}</li>
              </ul>
              <div v-if="$page.props.buyer" class="float-right">
                Thanks for your purchase,<a href="javascript:void(0)" @click="go"
                  ><div class="text-white">
                    Track your order : #{{ $page.props.buyer?.order_id }}
                  </div></a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BREADCRUMB AREA END -->
</template>
<style scoped>
.ltn__breadcrumb-area {
  background-color: #7aa649;
  padding-top: 50px;
  padding-bottom: 50px;
}
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
