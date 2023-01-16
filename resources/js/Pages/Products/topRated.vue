<template>

        <aside class="sidebar ltn__shop-sidebar ltn__right-sidebar">
            <!-- Top Rated Product Widget -->
            <div class="widget ltn__top-rated-product-widget">
                <h4 class="ltn__widget-title">Top Rated Product</h4>
                <ul>
                    <li
                        v-for="product in $page.props.bestSellers"
                        :key="product.id + 'bestSellers'"
                        >
                        <div class="top-rated-product-item clearfix">
                            <div class="top-rated-product-img">
                                <a @click="go(product)" href="javascript: void(0)"><img :src="product.fimage" alt="#"></a>
                            </div>
                            <div class="top-rated-product-info">
                                <div class="product-ratting">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                        <li><a href="#"><i class="fas fa-star"></i></a></li>
                                    </ul>
                                </div>
                                <h6><a @click="go(product)" href="javascript: void(0)">{{product.name}}</a></h6>
                                <div class="product-price">
                                    <span>{{ $page.props.currency_code }} {{ product.cprice }}</span>
                                    <del>$65.00</del>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Banner Widget -->
            <div class="widget ltn__banner-widget">
                <a href="shop.html"><img src="/img/banner/12.png" alt="#"></a>
            </div>
        </aside>
</template>

<script>
    import {Inertia} from "@inertiajs/inertia";

    export default {
        name: "topRated.vue",
        methods : {

            go: function (product) {
                Inertia.get(route("product.show", { id: product.id }));
            },
        }
    }
</script>

<style scoped>

</style>
