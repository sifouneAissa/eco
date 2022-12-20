<script setup>

    import NavBar from '@/Pages/Admin/Navbars/NavBar.vue';
    import SideBar from '@/Pages/Admin/Navbars/SideBar.vue';
    import Footer from '@/Pages/Admin/Footer.vue';

</script>
<template>
    <NavBar/>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <SideBar/>
            <!-- Page Content -->
        </div>

        <div id="layoutSidenav_content">
            <main>
                <slot />
            </main>
            <Footer/>
        </div>
    </div>

</template>
