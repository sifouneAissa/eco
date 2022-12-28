<script>
    import chooseAddress from '@/Pages/Checkout/chooseAddress.vue'
    import choosePayment from '@/Pages/Checkout/choosePayment.vue'
    import ProductCarousel from '@/Pages/Listing/ProductCarousel.vue'

    export  default  {
        components : {
            chooseAddress,
            choosePayment,
            ProductCarousel
        }
    }
</script>
<template>
    <div>
        <section class="offer-dedicated-body mt-4 mb-4 pt-2 pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="offer-dedicated-body-left">
                            <div class="bg-white rounded shadow-sm p-4 mb-4">
                                <h6 class="mb-3">You may also like</h6>
                                <ProductCarousel :models="$page.props.products"/>
                            </div>

                            <div class="pt-2"></div>
                            <chooseAddress :models="$page.props.addresses" />
                            <div class="pt-2"></div>
                            <choosePayment   />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="generator-bg rounded shadow-sm mb-4 p-4 osahan-cart-item">
                            <div class="d-flex mb-4 osahan-cart-item-profile">
                                <img class="img-fluid mr-3 rounded-pill" alt="osahan" src="img/2.jpg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-white">Spice Hut Indian Restaurant
                                    </h6>
                                    <p class="mb-0 text-white"><i class="icofont-location-pin"></i> 2036 2ND AVE, NEW YORK, NY 10029</p>
                                </div>
                            </div>
                            <div class="bg-white rounded shadow-sm mb-2">
                                <div class="gold-members p-2 border-bottom">
                                    <p class="text-gray mb-0 float-right ml-2">$314</p>
                                    <span class="count-number float-right">
                           <button class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>
                           <input class="count-number-input" type="text" value="1" readonly="">
                           <button class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>
                           </span>
                                    <div class="media">
                                        <div class="mr-2"><i class="icofont-ui-press text-danger food-item"></i></div>
                                        <div class="media-body">
                                            <p class="mt-1 mb-0 text-black">Chicken Tikka Sub</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="gold-members p-2 border-bottom">
                                    <p class="text-gray mb-0 float-right ml-2">$260</p>
                                    <span class="count-number float-right">
                           <button class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>
                           <input class="count-number-input" type="text" value="1" readonly="">
                           <button class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>
                           </span>
                                    <div class="media">
                                        <div class="mr-2"><i class="icofont-ui-press text-success food-item"></i></div>
                                        <div class="media-body">
                                            <p class="mt-1 mb-0 text-black">Cheese corn Roll</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="gold-members p-2 border-bottom">
                                    <p class="text-gray mb-0 float-right ml-2">$260</p>
                                    <span class="count-number float-right">
                           <button class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>
                           <input class="count-number-input" type="text" value="1" readonly="">
                           <button class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>
                           </span>
                                    <div class="media">
                                        <div class="mr-2"><i class="icofont-ui-press text-success food-item"></i></div>
                                        <div class="media-body">
                                            <p class="mt-1 mb-0 text-black">Cheese corn Roll</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="gold-members p-2 border-bottom">
                                    <p class="text-gray mb-0 float-right ml-2">$056</p>
                                    <span class="count-number float-right">
                           <button class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>
                           <input class="count-number-input" type="text" value="1" readonly="">
                           <button class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>
                           </span>
                                    <div class="media">
                                        <div class="mr-2"><i class="icofont-ui-press text-success food-item"></i></div>
                                        <div class="media-body">
                                            <p class="mt-1 mb-0 text-black">Coke [330 ml]</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="gold-members p-2 border-bottom">
                                    <p class="text-gray mb-0 float-right ml-2">$652</p>
                                    <span class="count-number float-right">
                           <button class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>
                           <input class="count-number-input" type="text" value="1" readonly="">
                           <button class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>
                           </span>
                                    <div class="media">
                                        <div class="mr-2"><i class="icofont-ui-press text-danger food-item"></i></div>
                                        <div class="media-body">
                                            <p class="mt-1 mb-0 text-black">Black Dal Makhani</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="gold-members p-2">
                                    <p class="text-gray mb-0 float-right ml-2">$122</p>
                                    <span class="count-number float-right">
                           <button class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>
                           <input class="count-number-input" type="text" value="1" readonly="">
                           <button class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>
                           </span>
                                    <div class="media">
                                        <div class="mr-2"><i class="icofont-ui-press text-danger food-item"></i></div>
                                        <div class="media-body">
                                            <p class="mt-1 mb-0 text-black">Mixed Veg</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 bg-white rounded p-2 clearfix">
                                <div class="input-group input-group-sm mb-2">
                                    <input type="text" class="form-control" placeholder="Enter promo code">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" id="button-addon2"><i class="icofont-sale-discount"></i> APPLY</button>
                                    </div>
                                </div>
                                <div class="input-group mb-0">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="icofont-comment"></i></span>
                                    </div>
                                    <textarea class="form-control" placeholder="Any suggestions? We will pass it on..." aria-label="With textarea"></textarea>
                                </div>
                            </div>
                            <div class="mb-2 bg-white rounded p-2 clearfix">
                                <p class="mb-1">Item Total <span class="float-right text-dark">$3140</span></p>
                                <p class="mb-1">Restaurant Charges <span class="float-right text-dark">$62.8</span></p>
                                <p class="mb-1">Delivery Fee <span class="text-info" data-toggle="tooltip" data-placement="top" title="Total discount breakup">
                           <i class="icofont-info-circle"></i>
                           </span> <span class="float-right text-dark">$10</span>
                                </p>
                                <p class="mb-1 text-success">Total Discount
                                    <span class="float-right text-success">$1884</span>
                                </p>
                                <hr />
                                <h6 class="font-weight-bold mb-0">TO PAY  <span class="float-right">$1329</span></h6>
                            </div>
                            <a href="thanks.html" class="btn btn-success btn-block btn-lg">PAY $1329
                                <i class="icofont-long-arrow-right"></i></a>
                        </div>
                        <div class="pt-2"></div>
                        <div class="alert alert-success" role="alert">
                            You have saved <strong>$1,884</strong> on the bill
                        </div>
                        <div class="pt-2"></div>
                        <div class="text-center pt-2">
                            <img class="img-fluid" src="https://dummyimage.com/352x504/ccc/ffffff.png&text=Google+ads">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section pt-5 pb-5 text-center bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="m-0">Operate food store or restaurants? <a href="login.html">Work With Us</a></h5>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
