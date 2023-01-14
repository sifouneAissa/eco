<template>
  <div class="owl-carousel owl-theme owl-carousel-four offers-interested-carousel mb-3">
    <BlogCard v-for="model in models" :key="model.id" :model="model" />
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
