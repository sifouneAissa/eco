<template>
  <section class="section pt-5 pb-5 products-section">
    <div class="container">
      <div class="section-header text-center">
        <h2>{{ $t("blog.page_title") }}</h2>
        <span class="line"></span>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="owl-carousel owl-carousel-four owl-theme">
            <div class="item" v-for="blog in $page.props.blogs" :key="blog.id">
              <div
                class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm"
              >
                <div class="list-card-image">
                  <Link :href="route('blog.show', { id: blog.id })">
                    <img
                      :src="blog.fimage"
                      class="img-fluid item-img"
                      style="width: 100%; height: 10vw"
                    />
                  </Link>
                </div>
                <div class="p-3 position-relative">
                  <div class="list-card-body">
                    <h6 class="mb-1">
                      <Link :href="route('blog.show', { id: blog.id })" class="text-black"
                        >{{ blog.title }}
                      </Link>
                    </h6>
                    <p>
                      <span>
                        <Link
                          :href="route('blog.show', { id: blog.id })"
                          class="btn btn-outline-secondary btn-sm m-2 float-right"
                        >
                          {{ $t("blog.details") }}
                        </Link>
                      </span>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  components: {
    Link,
  },
};
</script>
