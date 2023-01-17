<template>
  <!-- Blog Item -->
  <div class="col-lg-4 col-sm-6 col-12">
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
          <Link :href="route('blog.show', { id: model.id })">{{ model.title }} </Link>
        </h3>
        <p>Predictive analytics is drastically changing the real estate industry.</p>
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
import { useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
  props: ["model"],

  methods: {},
};
</script>
