<template>
    <div @click="submit(category.name)" v-for="category in $page.props.categories" class="item">
        <div class="osahan-category-item">
            <a  href="#">
                <img class="img-fluid" :src="category.fimage" alt="">
                <h6>{{category.name}}</h6>
                <p>{{category.count}}</p>
            </a>
        </div>
    </div>
</template>

<script setup>
    import  {Inertia} from '@inertiajs/inertia';

    const submit = (name) => {

        Inertia.get(route("listing",{
            query : name
        }));
    }
</script>

<style scoped>

</style>
