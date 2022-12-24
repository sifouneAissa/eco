<template>
    <AdminLayout  :title="'Show Order'" :urls="urls">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Show Order
            </h2>
        </template>
    </AdminLayout>
</template>

<script>

    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    export default {
        name: "showOrder.vue",
        components : {
            AdminLayout
        },
        data(){
            return {
                urls : [
                    {
                        name : 'Orders',
                        route : this.route('admin.order.index')
                    },
                    {
                        name : 'Show order '+this.$page.props.order.id,
                        route : "#"
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>
