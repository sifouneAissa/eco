<template>
  <!-- BLOG AREA START -->
  <div class="margin-section">
    <div class="ltn__blog-area ltn__blog-item-3-normal">
      <div class="container">
        <div class="row">
          <!-- Blog Item -->
          <div
            v-for="(blog, index) in $page.props.blogs"
            :key="blog.id"
            class="col-lg-4 col-sm-6 col-12"
          >
            <div class="ltn__blog-item ltn__blog-item-7">
              <div class="ltn__blog-img">
                <Link :href="route('blog.show', { id: blog.id })">
                  <img :src="blog.fimage" alt="blog" />
                  <!-- img/blog/1.jpg -->
                </Link>
              </div>
              <div class="ltn__blog-brief">
                <div class="ltn__blog-meta">
                  <ul>
                    <li v-if="blog.user" class="ltn__blog-author">
                      <a href="#">{{ $t("blog.by") }} {{ blog.user.name }}</a>
                      <!-- <a href="#">{{ $t("blog.by") }} Admin</a> -->
                    </li>
                    <li>
                      <span>{{ blog.created }}</span>
                    </li>
                  </ul>
                </div>
                <h3 class="ltn__blog-title">
                  <Link :href="route('blog.show', { id: blog.id })"
                    >{{ blog.title }}
                  </Link>
                </h3>
                <p>
                  {{ blog.description }}
                </p>
                <div class="ltn__blog-btn">
                  <Link :href="route('blog.show', { id: blog.id })">
                    {{ $t("blog.details") }}<i class="fas fa-angle-double-right"></i>
                  </Link>
                </div>
              </div>
            </div>
          </div>
          <!-- Blog Item -->
        </div>
      </div>
    </div>
    <!-- <div class="btn-wrapper text-center mt-0">
      <a href="#" class="btn btn-transparent btn-effect-3 btn-border">
        <span
          class="spinner-grow spinner-grow-sm"
          role="status"
          aria-hidden="true"
        ></span>
        {{ $t("listing.loading") }}</a
      >
    </div> -->
  </div>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { useForm, Head, Link } from "@inertiajs/inertia-vue3";

export default {
  name: "Blogs.vue",
  components: { Link },
  date() {
    return {};
  },
  created() {
    // setInterval(function () {
    //   Inertia.reload({
    //     only: ["blogs"],
    //     preserveScroll: true,
    //   });
    // }, 30000);
  },
  methods: {},
};
</script>

<style scoped>
@media only screen and (min-width: 800px) {
  .margin-section {
    margin-bottom: 80px;
  }
}
@media only screen and (max-width: 600px) {
  .margin-section {
    margin-bottom: 40px;
  }
}
</style>
