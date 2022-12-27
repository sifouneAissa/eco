<template>
    <section class="restaurant-detailed-banner">
        <div class="text-center">
            <img class="img-fluid cover" :src="$page.props.product.fimage">
        </div>
        <div class="restaurant-detailed-header">
            <div class="container">
                <div class="row d-flex align-items-end">
                    <div class="col-md-8">
                        <div class="restaurant-detailed-header-left">
                            <img class="img-fluid mr-3 float-left" alt="osahan" :src="$page.props.product.fimage">
                            <h2 class="text-white">{{$page.props.product.name}}</h2>
                            <p class="text-white mb-1"><i class="icofont-info"></i> {{$page.props.product.desc}} <span class="badge badge-success">OPEN</span>
                            </p>
                        </div>
                    </div>
<!--                    <div class="col-md-4">-->
<!--                        <div class="restaurant-detailed-header-right text-right">-->
<!--                            <button class="btn btn-success" type="button"><i class="icofont-clock-time"></i> 25–35 min-->
<!--                            </button>-->
<!--                            <h6 class="text-white mb-0 restaurant-detailed-ratings"><span class="generator-bg rounded text-white"><i class="icofont-star"></i> 3.1</span> 23 Ratings  <i class="ml-3 icofont-speech-comments"></i> 91 reviews</h6>-->
<!--                        </div>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </section>
</template>
