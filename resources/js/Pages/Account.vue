<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import AccountLayout from '@/Pages/Account/Layout.vue';
    import DashboardContent from '@/Pages/Dashboard-components/DashboardContent.vue';

    defineProps({
        addresses: Array,
    });

</script>

<template>
    <GuestLayout title="My Account">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Account
            </h2>
        </template>

        <AccountLayout title="My Account" />

    </GuestLayout>
</template>
