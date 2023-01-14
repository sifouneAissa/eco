<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import AccountLayout from '@/Pages/Account/Layout.vue';
    import DashboardContent from '@/Pages/Dashboard-components/DashboardContent.vue';

    defineProps({
        addresses: Array,
    });

</script>

<template>
    <GuestLayout :title="$t('account.account')">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{$t('account.account')}}
            </h2>
        </template>

        <AccountLayout :title="$t('account.account')" />

    </GuestLayout>
</template>
