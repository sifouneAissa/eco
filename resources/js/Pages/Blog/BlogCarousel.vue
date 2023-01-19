<template>
  <!-- BLOG AREA START (blog-3) -->
  <div class="ltn__blog-area pt-110 pb-90">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-title-area text-center">
            <h1 class="section-title">Latest Blog</h1>
            <p>There are many variations of passages of Lorem Ipsum available.</p>
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
