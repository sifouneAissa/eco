<script setup>
    defineProps({
        order : Object
    })


</script>
<template>


    <section class="section bg-white osahan-track-order-page position-relative">
        <!--         <iframe class="position-absolute" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d13696.650704896498!2d75.82434255!3d30.8821099!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1555184720550!5m2!1sen!2sin" width="100%" height="676" frameborder="0" style="border:0" allowfullscreen></iframe>-->
        <div class="container pt-5 pb-5">
            <div class="row d-flex align-items-center">
                <!--               <div class="col-md-6 text-center pb-4">-->
                <!--                  <div class="osahan-point mx-auto"></div>-->
                <!--               </div>-->
                <div class="col-md-6">
                    <div class="bg-white p-4 shadow-lg mb-2">
                        <div class="mb-2"><small>{{$t("track_order.order")}} {{order.order_number}}<a class="float-right font-weight-bold" href="#"><i class="icofont-headphone-alt"></i> {{$t("track_order.help")}}</a></small></div>
                        <h6 class="mb-1 mt-1"><a href="detail.html" class="text-black">{{order.names}}
                        </a>
                        </h6>
                        <p class="text-gray mb-0"><i class="icofont-clock-time"></i> 04:19 PM | {{order.products.length}} {{$t("track_order.items")}} | {{$page.props.currency_code}} {{order.price}}</p>
                    </div>
                    <div class="bg-white p-4 shadow-lg">
                        <div class="osahan-track-order-detail po">
                            <h5 class="mt-0 mb-3">{{$t("track_order.order")}}</h5>
                            <div class="row">
                                <div class="col-md-5">
                                    <small>{{$t("track_order.from")}}</small>
                                    <h6 class="mb-1 mt-1"><a href="detail.html" class="text-black"><i class="icofont-food-cart"></i> Spice Hut Restaurant
                                    </a>
                                    </h6>
                                    <p class="text-gray mb-5">2036, NEW YORK</p>
                                    <small>{{$t("track_order.deliver_to")}}</small>
                                    <h6 class="mb-1 mt-1"><span class="text-black"><i class="icofont-map-pins"></i> {{$t("track_order.other")}}
                                 </span>
                                    </h6>
                                    <p class="text-gray mb-0">291, Jawaddi Kalan, Ludhiana, Punjab 141002, India
                                    </p>
                                </div>
                                <div class="col-md-7">
                                    <div class="mb-2"><small><i class="icofont-list"></i> {{order.products.length}} {{$t("track_order.items")}}</small></div>

                                    <div v-for="product in order.order_items" :key="product.id">
                                        <p class="mb-2"><i class="icofont-ui-press text-success food-item"></i> {{product.product.name}} X {{product.quantity}}   <span class="float-right text-secondary">{{$page.props.currency_code}} {{product.product.cprice}}</span></p>
                                    </div>
                                    <p class="mb-0 font-weight-bold text-black">{{$t("track_order.total_bill")}} <span class="float-right text-secondary">{{$page.props.currency_code}}  {{order.price}}</span></p>
                                    <p class="mb-0 text-info"><small> {{$t("track_order.paid_via")}} Credit/Debit card
                                        <span class="float-right text-danger">$620 {{$t("track_order.off")}}</span></small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 shadow-lg mt-2">
                        <div class="row text-center">
                            <div class="col">
                                <i class="icofont-tasks icofont-3x text-info"></i>
                                <p class="mt-1 font-weight-bold text-dark mb-0">{{$t("track_order.order_received")}}</p>
                                <small class="text-info mb-0" v-if="!order.received">{{$t("track_order.now")}}</small>
                                <small class="text-success mb-0" v-else>{{$t("track_order.checked")}}</small>
                            </div>
                            <div class="col">
                                <i class="icofont-check-circled icofont-3x text-success"></i>
                                <p class="mt-1 font-weight-bold text-dark mb-0">{{$t("track_order.order_confirmed")}}</p>
                                <small class="text-info mb-0" v-if="!order.confirmed && order.received">{{$t("track_order.now")}}</small>
                                <small class="text-primary mb-0" v-else-if="!order.confirmed && !order.received">{{$t("track_order.later")}}</small>
                                <small class="text-success mb-0" v-else>{{$t("track_order.checked")}}</small>
                            </div>
                            <div class="col">
                                <i class="icofont-delivery-time icofont-3x text-primary"></i>
                                <p class="mt-1 font-weight-bold text-dark mb-0">{{$t("track_order.order_picked_up")}}</p>
                                <small class="text-info mb-0" v-if="!order.picked_up && order.confirmed">{{$t("track_order.now")}}</small>
                                <small class="text-primary mb-0" v-else-if="!order.picked_up && !order.confirmed">{{$t("track_order.later")}}</small>
                                <small class="text-success mb-0" v-else>{{$t("track_order.checked")}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</template>
