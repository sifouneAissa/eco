<template>
    <div>
        <div v-if="!($page.props.shopping_session && $page.props.shopping_session.user_id)" class="form-group col-md-12">
            <label>{{ $t("listing.checkout_card.name_card") }}</label>
            <input
                name="card_holder_name"
                required
                v-model="credit.name"
                type="text"
                class="form-control"
                :placeholder="$t('listing.checkout_card.enter_name')"
            />
        </div>
        <div
            v-if="!($page.props.shopping_session && $page.props.shopping_session.user_id)"
                  class="form-group col-md-12">
            <label>{{ $t("listing.checkout_card.email") }} </label>
            <input
                required
                v-model="credit.email"
                type="email"
                class="form-control"
                placeholder="xxxx@xxx.xx"
            />
        </div>
        <div v-show="credit.name && emailReg()"  id="smart-button-container">
            <div style="text-align: center;">
                <div id="paypal-button-container"></div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-center">
            <p class="h4">{{ $t("listing.checkout_card.pay") }} {{ props.currency_code }}
                {{ price }} </p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "paypalCheckout.vue",
        props : ['creditC','smodel'],

        data () {
            return {
                credit : this.creditC
            }
        },
        mounted() {
            console.log(this.credit);
            $("#script3").remove();
            let script1 = document.createElement("script");
            script1.src = 'https://www.paypal.com/sdk/js?client-id=ARB8PL-uLC8aUj93kfXermmVK7YS4cl3Y8y2wFKy_p8PP3s9-JklCFaF9cK3T1WjS-lZ9K3Z_DYh2auT&disable-funding=card&currency=USD';
            // script1.src = 'https://www.paypal.com/sdk/js?client-id=ARB8PL-uLC8aUj93kfXermmVK7YS4cl3Y8y2wFKy_p8PP3s9-JklCFaF9cK3T1WjS-lZ9K3Z_DYh2auT&currency=USD';
            script1.addEventListener('load',this.initPayPalButton)
            script1.id = "script3";
            // script1.async = false;
            document.body.append(script1); // (*)
        },
        computed: {
            model: function () {
                return this.smodel ? this.smodel : this.props.shopping_session;
            },
            props: function () {
                return this.$page.props;
            },
            price: function () {
                return this.smodel ? this.smodel.cprice * this.model.quantity : this.model.citotal;
            },
            dprice: function () {
                return this.smodel ? this.smodel.dprice * this.model.quantity : this.model.ptotal;
            },
        },
        methods : {

            emailReg: function () {
                return String(this.credit.email)
                    .toLowerCase()
                    .match(
                        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    );
            },
            SelectPaymentMethod  :function (payer){
                this.credit.user = payer;
                this.$emit("SelectPaymentMethod",'netbanking');
            },
            initPayPalButton: function() {
                let app = this;
                window.paypal.Buttons({
                    style: {
                        shape: 'rect',
                        color: 'gold',
                        layout: 'vertical',
                        label: 'paypal'
                    },

                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{"amount":{"currency_code":"USD","value": app.dprice}}]
                        });
                    },

                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(orderData) {
                            console.log("check");
                            // Full available details
                            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                            // Show a success message within this page, e.g.
                            const element = document.getElementById('paypal-button-container');
                            element.innerHTML = '';
                            element.innerHTML = '<h3>Thank you for your payment!</h3>';
                            app.SelectPaymentMethod(orderData.payer);
                            // Or go to another URL:  actions.redirect('thank_you.html');
                            // console.log("check");
                        });
                    },

                    onError: function(err) {
                        console.log(err);
                    }
                }).render('#paypal-button-container');
            }
        }
    }
</script>

<style scoped>

</style>
