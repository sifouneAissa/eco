<script setup>
    import { Head, Link } from "@inertiajs/inertia-vue3";
    import LinkCard from "@/Pages/Admin/NavBars/LinkCard.vue"
    defineProps({
        link : Object
    })

</script>
<template>
    <Link v-if="$can(link.permission) && !(link.children && link.children.length)" :class="'nav-link '+ ($page.props.route.current.name === link.route ? 'active' : '' ) " :href="route(link.route)">
        <div class="sb-nav-link-icon"><i :class="link.icon"></i></div>
        {{link.name}}
    </Link>
    <div v-else-if="$can(link.permission)  && link.children.length">
        <a  class="nav-link collapsed" href="#" data-toggle="collapse" :data-target="'#collapseLayoutss'+link.name" aria-expanded="false" :aria-controls="'collapseLayoutss'+link.name">
            <div class="sb-nav-link-icon"><i :class="link.icon"></i></div>
            {{link.name}}
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>
        <div :class="'collapse ' + (link.children.some((item) => $page.props.route.current.name === item.route) ? 'show' : '')" :id="'collapseLayoutss'+link.name" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <LinkCard v-for="linkC in link.children" :link="linkC" :key="linkC.name" />
            </nav>
        </div>
    </div>
</template>
