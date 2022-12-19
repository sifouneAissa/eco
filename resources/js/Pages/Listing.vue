<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import ListingLayout from '@/Pages/Listing/Layout.vue';

    defineProps({
        products : Array,
    });

</script>

<template>
    <GuestLayout title="Listing">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Listing
            </h2>
        </template>

        <ListingLayout title="Listing" />

    </GuestLayout>
</template>
