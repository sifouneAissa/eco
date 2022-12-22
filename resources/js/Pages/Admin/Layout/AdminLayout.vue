<script setup>

    import NavBar from '@/Pages/Admin/Navbars/NavBar.vue';
    import SideBar from '@/Pages/Admin/Navbars/SideBar.vue';
    import Footer from '@/Pages/Admin/Footer.vue';
    import { Head, Link } from "@inertiajs/inertia-vue3";

</script>
<template>
    <NavBar/>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <SideBar/>
            <!-- Page Content -->
        </div>
        <div id="layoutSidenav_content">
            <div class="container-fluid">
                <div v-if="$page.props.route.current.name !== 'admin.index'">
                    <h1 class="mt-4">{{$page.component}}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><Link :href="route('admin.index')">Dashboard</Link></li>
                        <li  class="breadcrumb-item active">{{$page.component}}</li>
                    </ol>
                </div>
                <main>
                    <slot />
                </main>
            </div>
            <Footer/>
        </div>
    </div>

</template>
