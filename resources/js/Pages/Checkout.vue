<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import CheckoutOption from '@/Pages/Checkout/CheckoutOption.vue';

    // defineProps({
    //     addresses: Array,
    // });


</script>

<template>
    <GuestLayout :title="'Checkout'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Checkout
            </h2>
        </template>

        <CheckoutOption />

    </GuestLayout>
</template>
