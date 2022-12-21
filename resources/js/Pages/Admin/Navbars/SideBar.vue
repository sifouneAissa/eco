<script setup>
    import { Head, Link } from "@inertiajs/inertia-vue3";
    import sidebar from "../../../common/sidebar";
    import LinkCard from "@/Pages/Admin/NavBars/LinkCard.vue"
    console.log(sidebar);
</script>
<template>
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>

                <LinkCard v-for="link in sidebar" :link="link" :key="link.name" />

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Ask Bootstrap
        </div>
    </nav>
</template>

