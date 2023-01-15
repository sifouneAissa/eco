<script setup>
        import OrderCard from "@/Pages/Account/Order/OrderCard.vue";
</script>

<template>
    <div class="tab-pane fade" id="liton_tab_1_2">
        <div class="ltn__myaccount-tab-content-inner">
            <OrderCard v-for="model in $page.props.orders" :key="model.id" :model="model" />
        </div>
    </div>
</template>
