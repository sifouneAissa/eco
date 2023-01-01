<template>
  <div class="col-md-9">
    <div class="row">
      <div
        v-for="(blog, index) in $page.props.blogs"
        :key="blog.id"
        class="col-md-4 col-sm-6 mb-4"
      >
        <div
          class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
        >
          <!-- <div class="list-card-image">
            <Link :href="route('blog.show', { id: blog.id })">
            </Link>
          </div> -->
          <div class="p-3 position-relative">
            <div class="list-card-body">
              <h6 class="mb-1">
                <a href="#" class="text-black">{{ blog.title }} </a>
              </h6>
              <!-- <p class="text-gray mb-2">{{ blog.desc }}</p> -->

              <p>
                <span>
                  <button class="btn btn-outline-secondary btn-sm m-2">details</button>
                </span>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 text-center load-more">
        <button class="btn btn-primary" type="button" disabled>
          <span
            class="spinner-grow spinner-grow-sm"
            role="status"
            aria-hidden="true"
          ></span>
          Loading...
        </button>
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
    setInterval(function () {
      Inertia.reload({
        only: ["blogs"],
        preserveScroll: true,
      });
    }, 30000);
  },
  methods: {},
};
</script>

<style scoped></style>
