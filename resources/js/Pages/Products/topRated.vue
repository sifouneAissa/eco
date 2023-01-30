<template>
  <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar margin-section">
    <!-- Top Rated Product Widget -->
    <div class="widget ltn__top-rated-product-widget">
      <h4 class="ltn__widget-title">{{ $t("listing.top_products") }}</h4>
      <ul>
        <li v-for="product in $page.props.bestSellers" :key="product.id + 'bestSellers'">
          <div class="top-rated-product-item clearfix">
            <div class="top-rated-product-img">
              <a @click="go(product)" href="javascript: void(0)"
                ><img :src="product.fimage" alt="#"
              /></a>
            </div>
            <div class="top-rated-product-info">
              <div class="product-ratting">
                <ul>
                  <li>
                    <a href="#"><i class="fas fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fas fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fas fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fas fa-star"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fas fa-star"></i></a>
                  </li>
                </ul>
              </div>
              <h6>
                <a @click="go(product)" href="javascript: void(0)">{{ product.lname }}</a>
              </h6>
              <div class="product-price">
                <span>{{ $page.props.currency_code }} {{ product.cprice }}</span>
                <del>{{ $page.props.currency_code }} {{ product.coprice }}</del>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <!-- Banner Widget -->
    <div class="widget ltn__banner-widget">
      <Link :href="route('listing')"><img src="/img/banner/12.png" alt="#" /></Link>
    </div>
  </aside>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import { useForm, Link } from "@inertiajs/inertia-vue3";

export default {
  name: "topRated.vue",
  components: {
    Link,
  },
  methods: {
    go: function (product) {
      Inertia.get(product.surl);
    },
  },
};
</script>

<style scoped>
@media only screen and (min-width: 800px) {
  .margin-section {
    margin-top: 80px;
  }
}
@media only screen and (max-width: 600px) {
  .margin-section {
    margin-top: 40px;
  }
}
</style>
