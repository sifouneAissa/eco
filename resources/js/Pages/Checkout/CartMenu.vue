<template>
    <div>
        <div  v-if="model && model.citotal"  class="generator-bg rounded shadow-sm mb-4 p-4 osahan-cart-item">
            <div  class="d-flex mb-4 osahan-cart-item-profile">
                <img class="img-fluid mr-3 rounded-pill" alt="osahan" :src="model.fimage">
                <div class="d-flex flex-column">
                    <h6 class="mb-1 text-white">{{model.names}}
                    </h6>
<!--                    <p class="mb-0 text-white"><i class="icofont-location-pin"></i> 2036 2ND AVE, NEW YORK, NY 10029</p>-->
                </div>
            </div>
            <div class="bg-white rounded shadow-sm mb-2">
                <div v-for="item in model.cart_items" :key="item.id" class="gold-members p-2 border-bottom">
                    <p class="text-gray mb-0 float-right ml-2">{{$page.props.currency_code}} {{item.qprice}}</p>
                    <span class="count-number float-right">
                           <button @click="incrQP(item,- 1)" class="btn btn-outline-secondary  btn-sm left dec"> <i class="icofont-minus"></i> </button>
                           <input class="count-number-input" type="text" :value="item.quantity" readonly="">
                           <button  @click="incrQP(item,+ 1)" class="btn btn-outline-secondary btn-sm right inc"> <i class="icofont-plus"></i> </button>
                           </span>
                    <div class="media align-content-center">
                        <div @click="submitD(item)" class="mr-2 "><i class="icofont-delete text-danger food-item"></i></div>
                        <div class="media-body">
                            <p class="mt-1 mb-0 text-black">{{item.product.name}}</p>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="mb-2 bg-white rounded p-2 clearfix">-->
<!--                <div class="input-group input-group-sm mb-2">-->
<!--                    <input type="text" class="form-control" placeholder="Enter promo code">-->
<!--                    <div class="input-group-append">-->
<!--                        <button class="btn btn-primary" type="button" id="button-addon2"><i class="icofont-sale-discount"></i> APPLY</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="input-group mb-0">-->
<!--                    <div class="input-group-prepend">-->
<!--                        <span class="input-group-text"><i class="icofont-comment"></i></span>-->
<!--                    </div>-->
<!--                    <textarea class="form-control" placeholder="Any suggestions? We will pass it on..." aria-label="With textarea"></textarea>-->
<!--                </div>-->
<!--            </div>-->
            <div class="mb-2 bg-white rounded p-2 clearfix">
                <p class="mb-1">Item Total <span class="float-right text-dark">{{$page.props.currency_code}} {{model.citotal}}</span></p>
<!--                <p class="mb-1">Restaurant Charges <span class="float-right text-dark">$62.8</span></p>-->
<!--                <p class="mb-1">Delivery Fee <span class="text-info" data-toggle="tooltip" data-placement="top" title="Total discount breakup">-->
<!--                           <i class="icofont-info-circle"></i>-->
<!--                           </span> <span class="float-right text-dark">$10</span>-->
<!--                </p>-->
<!--                <p class="mb-1 text-success">Total Discount-->
<!--                    <span class="float-right text-success">$1884</span>-->
<!--                </p>-->
                <hr />
                <h6 class="font-weight-bold mb-0">TO PAY  <span class="float-right">{{$page.props.currency_code}} {{model.citotal}}</span></h6>
            </div>
            <a @click="Pay"  class="btn btn-success btn-block btn-lg">PAY {{$page.props.currency_code}} {{model.citotal}}
                <i class="icofont-long-arrow-right"></i></a>
        </div>
<!--        <div class="pt-2"></div>-->
        <div  v-else  class="generator-bg rounded shadow-sm mb-4 p-4 osahan-cart-item">
            <div  class="d-flex mb-4 osahan-cart-item-profile">
                <img class="img-fluid mr-3 rounded-pill" alt="osahan" src="/img/checkout.png">
                <div class="d-flex flex-column">
                    <h6 class="mb-1 text-white">Empty list
                    </h6>
                    <!--                    <p class="mb-0 text-white"><i class="icofont-location-pin"></i> 2036 2ND AVE, NEW YORK, NY 10029</p>-->
                </div>
            </div>
            <div class="mb-2 bg-white rounded p-2 clearfix">
                <p class="mb-1">Item Total <span class="float-right text-dark">{{$page.props.currency_code}} 0</span></p>
                <!--                <p class="mb-1">Restaurant Charges <span class="float-right text-dark">$62.8</span></p>-->
                <!--                <p class="mb-1">Delivery Fee <span class="text-info" data-toggle="tooltip" data-placement="top" title="Total discount breakup">-->
                <!--                           <i class="icofont-info-circle"></i>-->
                <!--                           </span> <span class="float-right text-dark">$10</span>-->
                <!--                </p>-->
                <!--                <p class="mb-1 text-success">Total Discount-->
                <!--                    <span class="float-right text-success">$1884</span>-->
                <!--                </p>-->
                <hr />
                <h6  class="font-weight-bold mb-0">TO PAY  <span class="float-right">{{$page.props.currency_code}} 0</span></h6>
            </div>
            <Link :href="route('listing')" class="btn btn-success btn-block btn-lg">Add Products
                <i class="icofont-long-arrow-right"></i></Link>
        </div>

        <!--        <div class="alert alert-success" role="alert">-->
<!--            You have saved <strong>$1,884</strong> on the bill-->
<!--        </div>-->
    </div>
</template>

<script>
    import {useForm,Link} from "@inertiajs/inertia-vue3";
    import {Inertia} from "@inertiajs/inertia"
    import { useToast } from "vue-toastification";

    export default  {
        components : {
            Link
        },
        data () {
            return {
                // model : this.$page.props.shopping_session
            }

        },
        computed : {
            model : function (){
                return this.$page.props.shopping_session;
            }
        },
        methods : {
            incrQP(item,by){

                const toast = useToast();
                let q = item.quantity;
                let product = item.product;
                item.quantity = item.quantity + by;

                if(item.quantity > product.isA.remain) {
                    item.quantity = product.isA.remain
                    toast.warning('Max Quantity of product : ' + product.name);
                };

                if(!item.quantity) item.quantity = 1;

                if(q!==item.quantity)
                    this.submit(item,by);
            },
            submit : function (item) {
                let form = useForm({
                    quantity: item.quantity
                });

                form.transform(data => ({
                    ...data,
                })).patch(route('cartitem.update',{
                    id : item.id
                }), {
                    onSuccess :  (res) =>  {
                    }
                });
            },
            submitD(item){

                Inertia.delete(route('cartitem.destroy',{
                    id : item.id
                }), {
                    onSuccess :  (res) =>  {
                    }
                });
            },
            Pay(){
                this.$emit('Pay');
            }
        }
    }
</script>
