<template>
    <GuestLayout :title="title">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{title}}
            </h2>
        </template>
            <banner/>
            <tabs/>
            <recommended/>
            <footer/>
    </GuestLayout>
</template>

<script>

    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import footer from '@/Pages/Products/footer.vue';
    import banner from '@/Pages/Products/banner.vue';
    import recommended from '@/Pages/Products/recomended.vue';
    import tabs from '@/Pages/Products/tabs.vue';
    export default {
        components : {
            GuestLayout,
            footer,
            banner,
            recommended,
            tabs
        },
        props : ['title'],
        name: "Layout.vue"
    }
</script>

<style scoped>

</style>
