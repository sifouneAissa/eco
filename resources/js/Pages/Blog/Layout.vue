<script>
import PBlog from "@/Pages/Blog/Blogs.vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";

export default {
  props: ["title"],
  components: {
    PBlog,
    breadcrumb,
  },
  data() {
    return {};
  },
  mounted() {},
  watch: {},
  methods: {},
};
</script>

<template>
  <Head :title="title" />
  <breadcrumb :title="$t('nav_menu.pages.blog')" />
  <PBlog />
</template>

<style scoped></style>
