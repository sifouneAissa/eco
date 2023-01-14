<template>
    <section class="section pt-5 pb-5 osahan-not-found-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center pt-5 pb-5">
                    <img class="img-fluid mb-5" src="/img/thanks.png" alt="404">
                    <h1 class="mt-2 mb-2 text-success">{{$t("thanks.congratulations")}} {{order.user.name}} ! </h1>
                    <p class="mb-1">{{$t("thanks.msg")}}</p>
                    <p class="mb-1"> {{$t("thanks.order")}}: <div class="badge badge-success">{{order.id}}</div></p>
                    <p class="mb-5" v-if="order.user.unregistered"> {{$t("thanks.temporary_msg")}} <Link @click="create()"> {{$t("thanks.set_up")}}</Link>  {{$t("thanks.account")}}</p>
                    <p class="mb-5"> {{$t("thanks.send_email")}} : {{order.user.email}}</p>
                    <Link class="btn btn-primary btn-lg" :href="route('trackOrder',{
                        id : order.id
                    })"> {{$t("thanks.view_order")}}<i class="icofont-simple-smile"></i></Link>
                    <Link class="btn btn-success btn-lg" :href="route('listing')">{{$t("thanks.view_shop")}} <i class="icofont-cart"></i></Link>
                </div>
                <setPassword />
            </div>
        </div>
    </section>
</template>

<script>
    import {Link} from '@inertiajs/inertia-vue3';
    import {Inertia} from "@inertiajs/inertia";
    import setPassword from "@/Pages/Password/setPassword.vue";

    export default  {
        components : {
            Link,
            setPassword
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
