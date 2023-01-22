<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import BlogLayout from "@/Pages/Blog/Layout.vue";
defineProps({
  blogs: Array,
});
</script>

<template>
  <GuestLayout :title="$t('blog.page_title')">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $t("blog.page_title") }}
      </h2>
    </template>
    <BlogLayout :title="$t('blog.page_title')" />
  </GuestLayout>
</template>
