<script setup>
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import DashboardContent from '@/Pages/Dashboard-components/DashboardContent.vue';
</script>

<template>
    <GuestLayout :title="$t('dashboard')">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
         <DashboardContent />

    </GuestLayout>
</template>
