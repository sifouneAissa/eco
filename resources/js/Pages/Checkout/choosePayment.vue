<template>


    <div class="bg-white rounded shadow-sm p-4 osahan-payment">
        <h4 class="mb-1">Choose payment method</h4>
        <h6 class="mb-3 text-black-50">Credit/Debit Cards</h6>
        <div class="row">
            <div class="col-sm-4 pr-0">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="icofont-credit-card"></i> Credit/Debit Cards</a>
<!--                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#

" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="icofont-id-card"></i> Food Cards</a>-->
<!--                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="icofont-card"></i> Credit</a>-->
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="icofont-bank-alt"></i> Netbanking</a>
                    <a class="nav-link" id="v-pills-cash-tab" data-toggle="pill" href="#v-pills-cash" role="tab" aria-controls="v-pills-cash" aria-selected="false"><i class="icofont-money"></i> Pay on Delivery</a>
                </div>
            </div>
            <div class="col-sm-8 pl-0">
                <div class="tab-content h-100" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h6 class="mb-3 mt-0 mb-3">Add new card</h6>
                        <p>WE ACCEPT <span class="osahan-card">
                                       <i class="icofont-visa-alt"></i> <i class="icofont-mastercard-alt"></i> <i class="icofont-american-express-alt"></i> <i class="icofont-payoneer-alt"></i> <i class="icofont-apple-pay-alt"></i> <i class="icofont-bank-transfer-alt"></i> <i class="icofont-discover-alt"></i> <i class="icofont-jcb-alt"></i>
                                       </span>
                        </p>
                        <form method="post" class="card-form">
                            <div class="form-row">
<!--                                <input type="hidden" name="_token" :value="csrf">-->
<!--                                <input type="hidden" v-model="credit.paymentMethod"  name="payment_method" class="payment-method">-->
                                <div class="form-group col-md-12">
                                    <label>Name on card
                                    </label>
                                    <input name="card_holder_name" required v-model="credit.name" type="text" class="form-control" placeholder="Enter Card name">
                                </div>

                                <div class="form-group col-md-12">
                                    <div id="card-element"></div>
                                </div>

                                <div id="card-errors" role="alert"></div>

<!--                                <div class="form-group col-md-12">-->
<!--                                    <label for="inputPassword4">Card number</label>-->
<!--                                    <div class="input-group">-->
<!--                                        <input required v-model="credit.card_number" type="number" class="form-control" placeholder="Card number">-->
<!--                                        <div class="input-group-append">-->
<!--                                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="icofont-card"></i></button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-8">-->
<!--                                    <label>Valid through(MM/YY)-->
<!--                                    </label>-->
<!--                                    <input required v-model="credit.date" type="number" class="form-control" placeholder="Enter Valid through(MM/YY)">-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-4">-->
<!--                                    <label>CVV-->
<!--                                    </label>-->
<!--                                    <input required v-model="credit.cvv" type="number" class="form-control" placeholder="Enter CVV Number">-->
<!--                                </div>-->

                                <div class="form-group col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Securely save this card for a faster checkout next time.</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mb-0">
                                    <button type="submit" class="btn btn-success btn-block btn-lg pay">PAY {{props.currency_code}} {{model.citotal}}
                                        <i class="icofont-long-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
<!--                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">-->
<!--                        <h6 class="mb-3 mt-0 mb-3">Add new food card</h6>-->
<!--                        <p>WE ACCEPT  <span class="osahan-card">-->
<!--                                       <i class="icofont-sage-alt"></i> <i class="icofont-stripe-alt"></i> <i class="icofont-google-wallet-alt-1"></i>-->
<!--                                       </span>-->
<!--                        </p>-->
<!--                        <form>-->
<!--                            <div class="form-row">-->
<!--                                <div class="form-group col-md-12">-->
<!--                                    <label for="inputPassword4">Card number</label>-->
<!--                                    <div class="input-group">-->
<!--                                        <input type="number" class="form-control" placeholder="Card number">-->
<!--                                        <div class="input-group-append">-->
<!--                                            <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="icofont-card"></i></button>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-8">-->
<!--                                    <label>Valid through(MM/YY)-->
<!--                                    </label>-->
<!--                                    <input type="number" class="form-control" placeholder="Enter Valid through(MM/YY)">-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-4">-->
<!--                                    <label>CVV-->
<!--                                    </label>-->
<!--                                    <input type="number" class="form-control" placeholder="Enter CVV Number">-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-12">-->
<!--                                    <label>Name on card-->
<!--                                    </label>-->
<!--                                    <input type="text" class="form-control" placeholder="Enter Card number">-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-12">-->
<!--                                    <div class="custom-control custom-checkbox">-->
<!--                                        <input type="checkbox" class="custom-control-input" id="customCheck1">-->
<!--                                        <label class="custom-control-label" for="customCheck1">Securely save this card for a faster checkout next time.</label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group col-md-12 mb-0">-->
<!--                                    <a href="thanks.html" class="btn btn-success btn-block btn-lg">PAY $1329-->
<!--                                        <i class="icofont-long-arrow-right"></i></a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">-->
<!--                        <div class="border shadow-sm-sm p-4 d-flex align-items-center bg-white mb-3">-->
<!--                            <i class="icofont-apple-pay-alt mr-3 icofont-3x"></i>-->
<!--                            <div class="d-flex flex-column">-->
<!--                                <h5 class="card-title">Apple Pay</h5>-->
<!--                                <p class="card-text">Apple Pay lets you order now & pay later at no extra cost.</p>-->
<!--                                <a href="#" class="card-link font-weight-bold">LINK ACCOUNT <i class="icofont-link-alt"></i></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="border shadow-sm-sm p-4 d-flex bg-white align-items-center mb-3">-->
<!--                            <i class="icofont-paypal-alt mr-3 icofont-3x"></i>-->
<!--                            <div class="d-flex flex-column">-->
<!--                                <h5 class="card-title">Paypal</h5>-->
<!--                                <p class="card-text">Paypal lets you order now & pay later at no extra cost.</p>-->
<!--                                <a href="#" class="card-link font-weight-bold">LINK ACCOUNT <i class="icofont-link-alt"></i></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="border shadow-sm-sm p-4 d-flex bg-white align-items-center">-->
<!--                            <i class="icofont-diners-club mr-3 icofont-3x"></i>-->
<!--                            <div class="d-flex flex-column">-->
<!--                                <h5 class="card-title">Diners Club</h5>-->
<!--                                <p class="card-text">Diners Club lets you order now & pay later at no extra cost.</p>-->
<!--                                <a href="#" class="card-link font-weight-bold">LINK ACCOUNT <i class="icofont-link-alt"></i></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <h6 class="mb-3 mt-0 mb-3">Netbanking</h6>
                        <form >
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-outline-primary active">
                                    <input type="radio" name="options" id="option1" autocomplete="off" checked> HDFC <i class="icofont-check-circled"></i>
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="options" id="option2" autocomplete="off"> ICICI <i class="icofont-check-circled"></i>
                                </label>
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="options" id="option3" autocomplete="off"> AXIS <i class="icofont-check-circled"></i>
                                </label>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Select Bank
                                    </label>
                                    <br>
                                    <select required v-model="netbank.bank" class="custom-select form-control">
                                        <option selected>Bank</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12 mb-0">
                                    <button  class="btn btn-success btn-block btn-lg">PAY {{props.currency_code}} {{model.citotal}}
                                        <i class="icofont-long-arrow-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-cash" role="tabpanel" aria-labelledby="v-pills-cash-tab">
                        <h6 class="mb-3 mt-0 mb-3">Cash</h6>
                        <p>Please keep exact change handy to help us serve you better</p>
                        <hr>
                        <form>
                            <a @click="SelectPaymentMethod('payondelivery')" class="btn btn-success btn-block btn-lg">PAY {{props.currency_code}} {{model.citotal}}
                                <i class="icofont-long-arrow-right"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!--        <form method="POST"  class="card-form mt-3 mb-3">-->
<!--            <input type="hidden" name="_token" :value="csrf">-->
<!--            <input type="hidden" name="payment_method" class="payment-method">-->
<!--            <input class="StripeElement mb-3" name="card_holder_name" placeholder="Card holder name" required>-->
<!--            <div class="col-lg-4 col-md-6">-->
<!--                <div id="card-element"></div>-->
<!--            </div>-->
<!--            <div id="card-errors" role="alert"></div>-->
<!--            <div class="form-group mt-3">-->
<!--                <button type="submit" class="btn btn-primary pay">-->
<!--                    Purchase-->
<!--                </button>-->
<!--            </div>-->
<!--        </form>-->
    </div>
</template>


<script >
    import 'https://js.stripe.com/v3/'
    export  default  {

        mounted() {
            let app = this;
            $( document ).ready(function() {
                let stripe = Stripe(app.$page.props.STRIPE_KEY)
                let elements = stripe.elements()
                let style = {
                    base: {
                        color: '#32325d',
                        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#aab7c4'
                        }
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                }
                let card = elements.create('card', {style: style})
                card.mount('#card-element')
                let paymentMethod = null
                $('.card-form').on('submit', function (e) {
                    $('button.pay').attr('disabled', true)
                    if (paymentMethod) {
                        return true
                    }
                    stripe.confirmCardSetup(
                        app.$page.props.intent.client_secret,
                        {
                            payment_method: {
                                card: card,
                                billing_details: {name: $('.card_holder_name').val()}
                            }
                        }
                    ).then(function (result) {
                        if (result.error) {
                            $('#card-errors').text(result.error.message)
                            $('button.pay').removeAttr('disabled')
                        } else {
                            paymentMethod = result.setupIntent.payment_method
                            $('.payment-method').val(paymentMethod)
                            // $('.card-form').submit()
                            app.credit.paymentMethod = paymentMethod
                            $('button.pay').removeAttr('disabled')
                            app.SelectPaymentMethod('credit');

                        }
                    })
                    return false
                })
            });
        },
        computed : {
            model : function () {
                return this.props.shopping_session;
            },
            props : function (){
                return this.$page.props;
            }

        }
        ,
        data (){
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                credit : {
                    card_number : null,
                    date : null,
                    cvv : null,
                    name : null,
                    paymentMethod : null,
                    _token : this.csrf
                },
                netbank : {
                    bank : null
                },
                payonD : null
            }
        },
        methods : {
            SelectPaymentMethod : function (type){
                let types = {
                    credit : this.credit,
                    netbanking : this.netbank,
                    payondelivery : this.payonD
                };

                this.$emit('SelectPaymentMethod',{
                    data : types[type],
                    type : type
                })
            }
        }
    }
</script>

<style scoped>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
