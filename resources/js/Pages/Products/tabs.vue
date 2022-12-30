<template>
    <section class="offer-dedicated-nav bg-white border-top-0 shadow-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <span v-if="$page.props.product.isA.remain" class="restaurant-detailed-action-btn float-right">
                      <span class="count-number float-right row">
                        <div>
                           <button @click="incrQP(- 1)" class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>
                           <input  class="count-number-input" type="text" :value="$page.props.product.quantity" readonly="">
                           <button @click="incrQP(+ 1)" class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>

                        </div>
                          <button class="btn btn-outline-secondary btn-sm right inc ml-2" @click="submit(model)" >ADD <i class="icofont-shopping-cart"></i></button>
                          <button @click="ShowCheckout" class="btn btn-outline-success btn-sm right inc ml-2" >CHECKOUT <i class="icofont-long-arrow-right"></i></button>

                      </span>

                  </span>
                    <ul class="nav" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-order-online-tab" data-toggle="pill" href="#pills-order-online" role="tab" aria-controls="pills-order-online" aria-selected="true">Order Online</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-gallery-tab" data-toggle="pill" href="#pills-gallery" role="tab" aria-controls="pills-gallery" aria-selected="false">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-restaurant-info-tab" data-toggle="pill" href="#pills-restaurant-info" role="tab" aria-controls="pills-restaurant-info" aria-selected="false">Product Info</a>
                        </li>
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" id="pills-book-tab" data-toggle="pill" href="#pills-book" role="tab" aria-controls="pills-book" aria-selected="false">Book A Table</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" id="pills-reviews-tab" data-toggle="pill" href="#pills-reviews" role="tab" aria-controls="pills-reviews" aria-selected="false">Ratings & Reviews</a>-->
<!--                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import { Inertia, } from '@inertiajs/inertia';
    import {useForm} from "@inertiajs/inertia-vue3";

    export default {
        name: "listing.vue",
        date(){
            return {
                quantity: []
            }
        },
        created() {
        },
        methods : {
            ShowCheckout : function (){
                this.$emit('ShowCheckout',this.$page.props.product);
            },
            incrQP(by){
                this.$page.props.product.quantity = this.$page.props.product.quantity + by;
                if(this.$page.props.product.quantity > this.$page.props.product.isA.remain) this.$page.props.product.quantity = this.$page.props.product.isA.remain;

                if(!this.$page.props.product.quantity) this.$page.props.product.quantity = 1;
            },
            submit : function () {
                let app = this;
                let form = useForm({
                    product_id : this.$page.props.product.id,
                    quantity: this.$page.props.product.quantity
                });

                form.transform(data => ({
                    ...data,
                })).post(route('addProduct'), {
                    // onFinish: () => add_form.reset(),
                    onSuccess : function () {
                    }
                });
            },
        }
    }





</script>
