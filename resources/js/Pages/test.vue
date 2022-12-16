<script setup>
    import ClientLayout from '@/Layouts/ClientLayout.vue';
    import DashboardContent from '@/Pages/Dashboard-components/DashboardContent.vue';
</script>

<template>
    <ClientLayout title="test">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
<!--         <DashboardContent />-->

    </ClientLayout>
</template>
