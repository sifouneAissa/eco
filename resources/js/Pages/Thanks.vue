<template>
    <section class="section pt-5 pb-5 osahan-not-found-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center pt-5 pb-5">
                    <img class="img-fluid mb-5" src="/img/thanks.png" alt="404">
                    <h1 class="mt-2 mb-2 text-success">Congratulations {{order.user.name}} ! </h1>
                    <p class="mb-1">You have successfully placed your order</p>
                    <p class="mb-1">Your Order id is : <div class="badge badge-success">{{order.id}}</div></p>
                    <p class="mb-5" v-if="order.user.unregistered">This link is temporary be sure to save your id or <Link @click="create()">create</Link> an account  </p>
                    <p class="mb-5">We send an email to this mail : {{order.user.email}}</p>
                    <Link class="btn btn-primary btn-lg" :href="route('trackOrder',{
                        id : order.id
                    })">View Order <i class="icofont-simple-smile"></i></Link>
                    <Link class="btn btn-success btn-lg" :href="route('listing')">Shop more <i class="icofont-cart"></i></Link>
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
