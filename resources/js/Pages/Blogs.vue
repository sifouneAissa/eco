<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import BlogLayout from "@/Pages/Blog/Layout.vue";
defineProps({
  blogs: Array,
});
</script>

<template>
  <GuestLayout title="Blogs">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Blogs</h2>
    </template>
    <BlogLayout title="Blogs" />
  </GuestLayout>
</template>
