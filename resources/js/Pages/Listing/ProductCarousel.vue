<template>
    <div  class="owl-carousel owl-theme owl-carousel-four offers-interested-carousel mb-3 ">
        <ProductCard v-for="model in models" :key="model.id" :model="model" />
    </div>
</template>

<script>
    import ProductCard  from "@/Pages/Listing/ProductCard.vue";
    import  {Inertia} from "@inertiajs/inertia";

    export default {
        name: "ProductCarousel.vue",
        components : {
            ProductCard
        },
        props : ['models'],
        created() {
        }
    }
</script>

<style scoped>

</style>
