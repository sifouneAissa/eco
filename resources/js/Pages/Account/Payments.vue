<template>
    <div class="tab-pane fade" id="payments" role="tabpanel" aria-labelledby="payments-tab">
        <h4 class="font-weight-bold mt-0 mb-4">{{$t('account.menu.payments')}}</h4>
        <div class="row">
            <div v-for="payment in $page.props.paymentMethods" :key="payment.card.last4" class="col-md-6">
                <div class="bg-white card payments-item mb-4 shadow-sm">
                    <div class="gold-members p-4">
                        <a href="#">
                            <div class="media">
                                <img class="mr-3" :src="'/img/bank/'+payment.card.brand+'.png'" alt="Generic placeholder image">
                                <div class="media-body">
                                    <h6 class="mb-1">XXXX-XXXXXXXX-{{payment.card.last4}}</h6>
                                    <p>VALID TILL {{payment.card.exp_month+'/'+payment.card.exp_year}}</p>
                                    <p class="mb-0 text-black font-weight-bold">
                                        <a class="text-danger" data-toggle="modal" data-target="#delete-address-modal" href="#"><i class="icofont-ui-delete"></i> DELETE</a></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
