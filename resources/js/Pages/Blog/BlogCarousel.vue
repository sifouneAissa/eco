<template>
  <!-- BLOG AREA START (blog-3) -->
  <div class="ltn__blog-area pt-80 pb-80">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title-area text-center">
            <h1 class="section-title">{{ $t("faq.blogs") }}</h1>
            <p>{{ $t("dashboard.section3.desc") }}</p>
          </div>
        </div>
      </div>
      <div class="row ltn__blog-slider-one-active slick-arrow-1">
        <BlogCard v-for="model in models" :key="model.id" :model="model" />
      </div>
    </div>
    <!-- BLOG AREA END -->
  </div>
</template>

<script>
import BlogCard from "@/Pages/Blog/BlogCard.vue";
import { Inertia } from "@inertiajs/inertia";

export default {
  name: "BlogCarousel.vue",
  components: {
    BlogCard,
  },
  props: ["models"],
  created() {},
};
</script>

<style scoped></style>
