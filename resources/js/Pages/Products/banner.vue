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
                    <div class="col-md-4">
                        <div class="restaurant-detailed-header-right text-right">
                            <h6 class="text-white mb-0 restaurant-detailed-ratings">
                                <div v-if="$page.props.product.isA.remain === 0" class=""><span class="badge badge-dark">Not Available</span></div>
                                <div v-if="$page.props.product.isA.remain === 1" class=""><span class="badge badge-danger">One Product</span></div>
                                <div v-else-if="$page.props.product.isA.isA && $page.props.product.isA.remain <= 5" class=""><span class="badge badge-warning">The quantity is limited</span></div>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
