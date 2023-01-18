<script >

    import NavBar from '@/Pages/Admin/Navbars/NavBar.vue';
    import SideBar from '@/Pages/Admin/Navbars/SideBar.vue';
    import Footer from '@/Pages/Admin/Footer.vue';
    import { Head, Link } from "@inertiajs/inertia-vue3";
    import  {Inertia} from "@inertiajs/inertia";


    export default {
        components : {
            NavBar,
            SideBar,
            Footer,
            Head,
            Link
        },
        props : ['urls','title'],
        mounted() {
            // Add active state to sidbar nav links
            var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
            $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
                if (this.href === path) {
                    $(this).addClass("active");
                }
            });

            // Toggle the side navigation
            $("#sidebarToggle").on("click", function(e) {
                e.preventDefault();
                $("body").toggleClass("sb-sidenav-toggled");
            });

            let app = this;
            window.onload = function (){
                Inertia.visit(app.$page.url);
            };
        }
    }
</script>
<template >
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
                    <h1 class="mt-4">{{title}}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><Link :href="route('admin.index')">Dashboard</Link></li>
                        <li  class="breadcrumb-item active"><Link class="text-dark" :href="'#'">{{title}}</Link></li>
                    </ol>
                </div>
                <div  v-else-if="urls">
                    <h1 class="mt-4">{{title}}</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><Link :href="route('admin.index')">Dashboard</Link></li>
                        <li v-for="(url,index) in urls" :key="url.name"  :class="'breadcrumb-item '"><Link :class="(index === urls.length-1) ? 'text-dark':''" :href="url.route">{{url.name}}</Link></li>
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
