<template>
  <GuestLayout :title="title">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ title }}
      </h2>
    </template>
    <breadcrumb :title="$t('nav_menu.help.contact_us')" />
    <blog-card />
  </GuestLayout>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import footer from "@/Pages/Blog/Details/footer.vue";
import banner from "@/Pages/Blog/Details/banner.vue";
import blogCard from "@/Pages/Blog/Details/card.vue";
import breadcrumb from "@/Pages/Common/breadcrumb.vue";

export default {
  components: {
    GuestLayout,
    blogCard,
    breadcrumb,
  },
  props: ["title"],
  name: "Layout.vue",
  data() {
    return {};
  },
  created() {},
  computed: {},
  methods: {},
};
</script>

<style scoped></style>
