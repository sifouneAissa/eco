<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
defineProps({
  title: String,
  img: {
    type: String,
    default: "img/bg/4.png",
  },
});
</script>

<template>
  <!-- BREADCRUMB AREA START -->
  <div
    class="ltn__breadcrumb-area ltn__breadcrumb-area-4 bg-overlay-theme-10--- bg-image"
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
  margin-bottom: 100px;
  padding-top: 50px;
  padding-bottom: 50px;
}
</style>
