<template>
    <GuestLayout :title="title">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{title}}
            </h2>
        </template>
            <banner/>
            <tabs @ShowCheckout="ShowCheckout" />
            <recommended/>
            <footer/>
            <CheckoutCard :model="model" v-if="model && checkout" />
    </GuestLayout>
</template>

<script>

    import GuestLayout from '@/Layouts/GuestLayout.vue';
    import footer from '@/Pages/Products/footer.vue';
    import banner from '@/Pages/Products/banner.vue';
    import recommended from '@/Pages/Products/recomended.vue';
    import tabs from '@/Pages/Products/tabs.vue';
    import CheckoutCard from "@/Pages/Checkout/CheckoutCard.vue";
    // import {useToast} from "vue-toastification";

    export default {
        components : {
            GuestLayout,
            footer,
            banner,
            recommended,
            tabs,
            CheckoutCard
        },
        props : ['title'],
        name: "Layout.vue",
        data(){
            return {
                checkout : false,
                model : null
            }
        },
        created() {

            // const toast = useToast();
            // console.log("this.$page.props.message")
            // console.log(this.$page.props.message)
            // if(!this.toast)
            // toast("I'm a toast!");
        },
        computed : {
            // toast : function (){
            //     return !this.$page.props.message;
            // }
        },
        methods : {
            ShowCheckout : function (data) {
                    this.checkout = true;
                    this.model = data;
                    window.location.href = window.location.href.split('#')[0] + "#checkout-payment";
            }
        }
    }
</script>

<style scoped>

</style>
