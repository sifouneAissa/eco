<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area">
                    <h1 class="section-title">Related Products<span>.</span></h1>
                </div>
            </div>
        </div>
        <div class="row ltn__related-product-slider-one-active slick-arrow-1">
            <!-- ltn__product-item -->
            <div v-for="model in models" :key="model.id" class="col-lg-12">
                <ProductCard :model="model"  />
            </div>
        </div>
    </div>
</template>
<script>
    import ProductCard from "@/Pages/Listing/ProductCard.vue";

    export default {
        components : {
            ProductCard
        },
        props : ['models']
    }
</script>
