<template>
  <!-- Blog Item -->
  <div class="col-md-6 col-12">
    <div class="ltn__blog-item ltn__blog-item-7">
      <div class="ltn__blog-img">
        <Link :href="route('blog.show', { id: model.id })">
          <img :src="model.fimage" alt="blog" />
          <!-- img/blog/1.jpg -->
        </Link>
      </div>
      <div class="ltn__blog-brief">
        <div class="ltn__blog-meta">
          <ul>
            <li v-if="model.user" class="ltn__blog-author">
              <a href="#">{{ $t("blog.by") }} {{ model.user.name }}</a>
              <!-- <a href="#">{{ $t("blog.by") }} Admin</a> -->
            </li>
            <li>
              <span>{{ model.created }}</span>
            </li>
          </ul>
        </div>
        <h3 class="ltn__blog-title">
          <Link :href="route('blog.show', { id: model.id })">{{ model.title }} </Link>
        </h3>
        <p>
          {{ model.description }}
        </p>
        <div class="ltn__blog-btn">
          <Link :href="route('blog.show', { id: model.id })">
            {{ $t("blog.details") }}<i class="fas fa-angle-double-right"></i>
          </Link>
        </div>
      </div>
    </div>
  </div>
  <!-- Blog Item -->
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { useForm, Head, Link } from "@inertiajs/inertia-vue3";

export default {
  props: ["model"],
  components: {
    Link,
  },
  methods: {},
};
</script>
