<script setup>
    import { Head, Link } from "@inertiajs/inertia-vue3";
    import sidebar from "../../../common/sidebar";
    import LinkCard from "@/Pages/Admin/NavBars/LinkCard.vue"
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
            <div class="h6">Logged in as : </div>
            <h6><span v-for="role in $page.props.auth.roles" :key="role" class="badge badge-success">{{role}}</span></h6>
        </div>
    </nav>
</template>

