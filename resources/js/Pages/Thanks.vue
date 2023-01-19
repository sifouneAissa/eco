<template>
    <GuestLayout :title="'Thanks'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{'Thanks'}}
            </h2>
        </template>
        <!-- BREADCRUMB AREA START -->
        <breadcrumb  :title="'Thanks'" />
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-md-12 text-center">-->
<!--&lt;!&ndash;                    <img class="img-fluid mb-5" src="/img/thanks.png" alt="404">&ndash;&gt;-->
<!--                    <h1 class="mt-2 mb-2 text-success">{{$t("thanks.congratulations")}} {{order.user.name}} ! </h1>-->
<!--                    <p class="mb-1">{{$t("thanks.msg")}}</p>-->
<!--                    <p class="mb-1"> {{$t("thanks.order")}}: <div class="badge badge-success">{{order.id}}</div></p>-->
<!--                    <p class="mb-5" v-if="order.user.unregistered"> {{$t("thanks.temporary_msg")}} <Link @click="create()"> {{$t("thanks.set_up")}}</Link>  {{$t("thanks.account")}}</p>-->
<!--                    <p class="mb-5"> {{$t("thanks.send_email")}} : {{order.user.email}}</p>-->
<!--&lt;!&ndash;                    <Link class="btn btn-primary btn-lg" :href="route('trackOrder.index')"> {{$t("thanks.view_order")}}<i class="icofont-simple-smile"></i></Link>&ndash;&gt;-->
<!--&lt;!&ndash;                    <Link class="btn btn-success btn-lg" :href="route('listing')">{{$t("thanks.view_shop")}} <i class="icofont-cart"></i></Link>&ndash;&gt;-->
<!--                </div>-->
<!--                <setPassword />-->
<!--            </div>-->
<!--        </div>-->
    </GuestLayout>
</template>

<script>
    import {Link} from '@inertiajs/inertia-vue3';
    import {Inertia} from "@inertiajs/inertia";
    import setPassword from "@/Pages/Password/setPassword.vue";
    import breadcrumb from "@/Pages/Common/breadcrumb.vue"
    import GuestLayout  from "@/Layouts/GuestLayout.vue";

    export default  {
        components : {
            Link,
            setPassword,
            breadcrumb,
            GuestLayout
        },
        methods : {
            create : function (){
                Inertia.get(route('setpassword'),{},{
                    onSuccess : (res) => {
                        $("#set-password").modal("show")
                    }
                })
            }
        },
        props : ['order'],
        data (){
            return {
            }
        },
        mounted() {
            clearInterval(window.idleIntervalTimer);

            let app = this;
            if (this.$page.props.setPassword) {

                let modal = $("#set-password");

                modal.on("hidden.bs.modal", function () {
                    app.$emit("ResetModel");
                });

                modal.modal("show");
            }
        }
    }
</script>
