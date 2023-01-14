<script >
    import GuestLayout from '@/Layouts/GuestLayout.vue';
    // import DashboardContent from '@/Pages/Dashboard-components/DashboardContent.vue';
    export  default  {
        components : {
            GuestLayout,
            // DashboardContent
        }
    }
</script>

<template>
    <GuestLayout title="Welcome">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Welcome
            </h2>
        </template>
<!--        <DashboardContent />-->
        <!-- HEADER AREA START (header-4) -->
        <!-- HEADER AREA END -->

    </GuestLayout>
</template>
