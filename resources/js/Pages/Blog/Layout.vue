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
  <div class="btn-wrapper text-center">
    <a href="#" class="btn btn-transparent btn-effect-3 btn-border">
      <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
      {{ $t("listing.loading") }}</a
    >
  </div>
</template>

<style scoped></style>
