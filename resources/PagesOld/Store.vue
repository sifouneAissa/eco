<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import StoreLayout from '@/Pages/Store/Layout.vue';

    // defineProps({
    //     addresses: Array,
    // });

</script>

<template>
    <GuestLayout title="My Store">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My Store
            </h2>
        </template>

        <StoreLayout title="My Store" />

    </GuestLayout>
</template>
