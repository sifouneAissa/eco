<script>
    import ProductCard from "@/Pages/Listing/ProductCard.vue";
    export default  {
        components : {
            ProductCard
        }
    }
</script>
<template>

    <!-- PRODUCT TAB AREA START (product-item-3) -->
    <div class="ltn__product-tab-area ltn__product-gutter pt-110 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h1 class="section-title">Our Products</h1>
                        <p>There are many variations of passages of Lorem Ipsum available.</p>
                    </div>
                    <div
                        class="ltn__tab-menu ltn__tab-menu-2 ltn__tab-menu-top-right-- text-uppercase text-center"
                    >
                        <div class="nav">
                            <a class="active show" data-toggle="tab" href="#liton_tab_3_1">Popular</a>
                            <a data-toggle="tab" href="#liton_tab_3_2" class="">New</a>
                            <a data-toggle="tab" href="#liton_tab_3_3" class="">Best Sale</a>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="liton_tab_3_1">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                    <!-- ltn__product-item -->
                                    <div v-for="item in $page.props.populars"  class="col-lg-12">
                                        <ProductCard :model="item"/>
                                    </div>

                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_3_2">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                    <!-- ltn__product-item -->
                                    <div v-for="item in $page.props.nproducts"  class="col-lg-12">
                                        <ProductCard :model="item"/>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="liton_tab_3_3">
                            <div class="ltn__product-tab-content-inner">
                                <div class="row ltn__tab-product-slider-one-active slick-arrow-1">
                                    <!-- ltn__product-item -->
                                    <div v-for="item in $page.props.bestSellers"  class="col-lg-12">
                                        <ProductCard :model="item"/>
                                    </div>
                                    <!--  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PRODUCT TAB AREA END -->

</template>
