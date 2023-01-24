<template>
    <!-- PRODUCT AREA START -->
    <div class="ltn__product-area ltn__product-gutter pb-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">{{$page.props.dcat.lname}}</h1>
                        <p>{{$page.props.dcat.ldesc}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                <div v-for="product in $page.props.dcat.products" class="col-lg-4 col-md-4 col-sm-6 col-6">
                    <ProductCard :img_height="400" :model="product"/>
                </div>
                <!-- ltn__product-item -->
<!--                <div class="col-lg-4 col-md-4 col-sm-6 col-6">-->
<!--                    <div class="ltn__product-item ltn__product-item-3 text-center">-->
<!--                        <div class="product-img" style="height: 300px">-->
<!--                            <a href="product-details.html"-->
<!--                            ><img src="/img/product/15.png" alt="#"-->
<!--                            /></a>-->
<!--                            <div class="product-badge">-->
<!--                                <ul>-->
<!--                                    <li class="sale-badge">New</li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <div class="product-hover-action">-->
<!--                                <ul>-->
<!--                                    <li>-->
<!--                                        <a-->
<!--                                            href="#"-->
<!--                                            title="Quick View"-->
<!--                                            data-toggle="modal"-->
<!--                                            data-target="#quick_view_modal"-->
<!--                                        >-->
<!--                                            <i class="far fa-eye"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a-->
<!--                                            href="#"-->
<!--                                            title="Add to Cart"-->
<!--                                            data-toggle="modal"-->
<!--                                            data-target="#add_to_cart_modal"-->
<!--                                        >-->
<!--                                            <i class="fas fa-shopping-cart"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a-->
<!--                                            href="#"-->
<!--                                            title="Wishlist"-->
<!--                                            data-toggle="modal"-->
<!--                                            data-target="#liton_wishlist_modal"-->
<!--                                        >-->
<!--                                            <i class="far fa-heart"></i-->
<!--                                            ></a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="product-info">-->
<!--                            <h2 class="product-title">-->
<!--                                <a href="product-details.html">Beard Care Oil</a>-->
<!--                            </h2>-->
<!--                            <div class="product-price">-->
<!--                                <span>$149.00</span>-->
<!--                                <del>$162.00</del>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; ltn__product-item &ndash;&gt;-->
<!--                <div class="col-lg-4 col-md-4 col-sm-6 col-6">-->
<!--                    <div class="ltn__product-item ltn__product-item-3 text-center">-->
<!--                        <div class="product-img" style="height: 300px">-->
<!--                            <a href="product-details.html"-->
<!--                            ><img src="/img/product/14.png" alt="#"-->
<!--                            /></a>-->
<!--                            <div class="product-badge">-->
<!--                                <ul>-->
<!--                                    <li class="sale-badge">New</li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <div class="product-hover-action">-->
<!--                                <ul>-->
<!--                                    <li>-->
<!--                                        <a-->
<!--                                            href="#"-->
<!--                                            title="Quick View"-->
<!--                                            data-toggle="modal"-->
<!--                                            data-target="#quick_view_modal"-->
<!--                                        >-->
<!--                                            <i class="far fa-eye"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a-->
<!--                                            href="#"-->
<!--                                            title="Add to Cart"-->
<!--                                            data-toggle="modal"-->
<!--                                            data-target="#add_to_cart_modal"-->
<!--                                        >-->
<!--                                            <i class="fas fa-shopping-cart"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a-->
<!--                                            href="#"-->
<!--                                            title="Wishlist"-->
<!--                                            data-toggle="modal"-->
<!--                                            data-target="#liton_wishlist_modal"-->
<!--                                        >-->
<!--                                            <i class="far fa-heart"></i-->
<!--                                            ></a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="product-info">-->
<!--                            <h2 class="product-title">-->
<!--                                <a href="product-details.html">Beard Growth Vitamins</a>-->
<!--                            </h2>-->
<!--                            <div class="product-price">-->
<!--                                <span>$129.00</span>-->
<!--                                <del>$145.00</del>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                &lt;!&ndash; ltn__product-item &ndash;&gt;-->
<!--                <div class="col-lg-4 col-md-4 col-sm-6 col-6">-->
<!--                    <div class="ltn__product-item ltn__product-item-3 text-center">-->
<!--                        <div class="product-img" style="height: 300px">-->
<!--                            <a href="product-details.html"-->
<!--                            ><img src="/img/product/13.png" alt="#"-->
<!--                            /></a>-->
<!--                            <div class="product-badge">-->
<!--                                <ul>-->
<!--                                    <li class="sale-badge">New</li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <div class="product-hover-action">-->
<!--                                <ul>-->
<!--                                    <li>-->
<!--                                        <a-->
<!--                                            href="#"-->
<!--                                            title="Quick View"-->
<!--                                            data-toggle="modal"-->
<!--                                            data-target="#quick_view_modal"-->
<!--                                        >-->
<!--                                            <i class="far fa-eye"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a-->
<!--                                            href="#"-->
<!--                                            title="Add to Cart"-->
<!--                                            data-toggle="modal"-->
<!--                                            data-target="#add_to_cart_modal"-->
<!--                                        >-->
<!--                                            <i class="fas fa-shopping-cart"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                    <li>-->
<!--                                        <a-->
<!--                                            href="#"-->
<!--                                            title="Wishlist"-->
<!--                                            data-toggle="modal"-->
<!--                                            data-target="#liton_wishlist_modal"-->
<!--                                        >-->
<!--                                            <i class="far fa-heart"></i-->
<!--                                            ></a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="product-info">-->
<!--                            <h2 class="product-title">-->
<!--                                <a href="product-details.html">Beard Growth Oil</a>-->
<!--                            </h2>-->
<!--                            <div class="product-price">-->
<!--                                <span>$119.00</span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <!--  -->
            </div>
        </div>
    </div>
    <!-- PRODUCT SLIDER AREA END -->
</template>
<script>
    import ProductCard from "@/Pages/Listing/ProductCard.vue";
    export default {
        components : {
            ProductCard
        }
    }
</script>
