<script>
import PBlog from "@/Pages/Blog/Blogs.vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  props: ["title"],
  components: {
    PBlog,
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

  <section class="breadcrumb-osahan pt-5 pb-5 bg-dark position-relative text-center">
    <h1 class="text-white">{{ $t("blog.title") }}</h1>
    <!-- <h6 class="text-white-50"></h6> -->
  </section>
  <section class="section pt-5 pb-5 products-listing">
    <div class="container">
      <div class="row d-none-m">
        <div class="col-md-12">
          <!-- <div class="dropdown float-right">
            <a
              class="btn btn-outline-info dropdown-toggle btn-sm border-white-btn"
              href="#"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Sort by: <span class="text-theme">Distance</span> &nbsp;&nbsp;
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow-sm border-0">
              <a class="dropdown-item" href="#">Distance</a>
              <a class="dropdown-item" href="#">No Of Offers</a>
              <a class="dropdown-item" href="#">Rating</a>
            </div>
          </div> -->
          <h4 class="font-weight-bold mt-0 mb-3">
            <small class="h6 mb-0 ml-2"
              >{{ $page.props.count }} {{ $t("blog.blogs") }}
            </small>
          </h4>
        </div>
      </div>
      <div class="row">
        <PBlog />
      </div>
    </div>
  </section>
</template>

<style scoped></style>
