<template>
  <!-- BLOG AREA START -->
  <div class="ltn__blog-area ltn__blog-item-3-normal mb-100">
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
              <a href="blog-details.html"><img src="img/blog/1.jpg" alt="#" /></a>
            </div>
            <div class="ltn__blog-brief">
              <div class="ltn__blog-meta">
                <ul>
                  <li class="ltn__blog-author">
                    <a href="#">by: Admin</a>
                  </li>
                  <li>
                    <span>Nov 18, 2020</span>
                  </li>
                </ul>
              </div>
              <h3 class="ltn__blog-title">
                <Link :href="route('blog.show', { id: blog.id })">{{ blog.title }} </Link>
              </h3>
              <p>
                Predictive analytics is drastically changing the real estate industry.
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

<style scoped></style>
