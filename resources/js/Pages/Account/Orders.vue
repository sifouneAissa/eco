<script setup>
        import OrderCard from "@/Pages/Account/Order/OrderCard.vue";
</script>

<template>
    <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
        <h4 class="font-weight-bold mt-0 mb-4">{{$t('account.orders.past_orders')}}</h4>
        <OrderCard v-for="model in $page.props.orders" :key="model.id" :model="model" />
<!--        <div class="bg-white card mb-4 order-list shadow-sm">-->
<!--            <div class="gold-members p-4">-->
<!--                <a href="#">-->
<!--                    <div class="media">-->
<!--                        <img class="mr-4" src="img/3.jpg" alt="Generic placeholder image">-->
<!--                        <div class="media-body">-->
<!--                            <span class="float-right text-info">Delivered on Mon, Nov 12, 7:18 PM <i class="icofont-check-circled text-success"></i></span>-->
<!--                            <h6 class="mb-2">-->
<!--                                <a href="detail.html" class="text-black">Gus's World Famous Fried Chicken-->
<!--                                </a></h6>-->
<!--                            <p class="text-gray mb-1"><i class="icofont-location-arrow"></i> 730 S Mendenhall Rd, Memphis, TN 38117, USA-->
<!--                            </p>-->
<!--                            <p class="text-gray mb-3"><i class="icofont-list"></i> ORDER #25102589748 <i class="icofont-clock-time ml-2"></i> Mon, Nov 12, 6:26 PM</p>-->
<!--                            <p class="text-dark">Veg Masala Roll x 1, Veg Burger x 1, Veg Penne Pasta in Red Sauce x 1-->
<!--                            </p>-->
<!--                            <hr>-->
<!--                            <div class="float-right">-->
<!--                                <a class="btn btn-sm btn-outline-primary" href="#"><i class="icofont-headphone-alt"></i> HELP</a>-->
<!--                                <a class="btn btn-sm btn-primary" href="detail.html"><i class="icofont-refresh"></i> REORDER</a>-->
<!--                            </div>-->
<!--                            <p class="mb-0 text-black text-primary pt-2"><span class="text-black font-weight-bold"> Total Paid:</span>  $300-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</template>
