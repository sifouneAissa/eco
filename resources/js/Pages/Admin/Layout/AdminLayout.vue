<script setup>

    import NavBar from '@/Pages/Admin/Navbars/NavBar.vue';
    import SideBar from '@/Pages/Admin/Navbars/SideBar.vue';
    import Footer from '@/Pages/Admin/Footer.vue';
    import { Head, Link } from "@inertiajs/inertia-vue3";
    defineProps({
        title : String,
        urls : Array
    })
</script>
<template>
    <Head :title="title" />
    <NavBar/>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <SideBar/>
            <!-- Page Content -->
        </div>
        <div id="layoutSidenav_content">
            <div class="container-fluid">
                <div  v-if="($page.props.route.current.name !== 'admin.index') && !urls">
                    <h1 class="mt-4">{{$page.component}}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><Link :href="route('admin.index')">Dashboard</Link></li>
                        <li  class="breadcrumb-item active"><Link :href="'#'">{{$page.component}}</Link></li>
                    </ol>
                </div>
                <div  v-else-if="urls">
                    <h1 class="mt-4">{{$page.component}}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><Link :href="route('admin.index')">Dashboard</Link></li>
                        <li v-for="(url,index) in urls" :key="url.name"  :class="'breadcrumb-item '"><Link :href="url.route">{{url.name}}</Link></li>
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
