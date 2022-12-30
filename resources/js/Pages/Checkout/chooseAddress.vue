<template>

    <div id="address"  class="bg-white rounded shadow-sm p-4 mb-4">
        <h4 class="mb-1">Choose a delivery address</h4>
        <h6 class="mb-3 text-black-50">Multiple addresses in this location</h6>
        <div  class="row">
            <div v-for="model in sModels" :key="model.mobile" :class="card_class ? card_class : 'col-md-6'">
                <div class="bg-white card addresses-item">

                    <div class="gold-members p-4">
                        <div class="media">
                            <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
                            <div class="media-body">
                                <h6 class="mb-1 text-secondary">{{model.city}}</h6>
                                <p>{{model.address_line_1}},{{model.city}},{{model.country}}
                                </p>
                                    <p v-if="!model.toCreate" class="mb-0 text-black font-weight-bold"><a href="javascript: void(0)" @click="setSelectedAddress(model)" :class="'btn btn-sm mr-2 '+ ( selectedA.id === model.id ? 'btn-success' : 'btn-secondary' )"> DELIVER HERE</a>
                                    </p>
                                    <p  v-if="model.toCreate" class="mb-0 text-black font-weight-bold"><a href="javascript: void(0)" @click="add=true" :class="'btn btn-sm mr-2 btn-danger'"> EDIT</a>
                                        <!--                                    <span>{{model.mobi}}</span>-->
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="add" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-address">{{$t("account.addresses.add_card.title")}}</h5>
            </div>
            <div class="modal-body">
<!--                <form >-->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="address_line_1">{{$t("account.addresses.add_card.address1")}}</label>
                            <div class="input-group">
                                <input required type="text" v-model="add_form.address_line_1" class="form-control" id="address_line_1" :placeholder="$t('account.addresses.add_card.address1')">
<!--                                <div class="input-group-append">-->
<!--                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="icofont-ui-pointer"></i></button>-->
<!--                                </div>-->

                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address_line_1">{{$t("account.addresses.add_card.address2")}}</label>
                            <div class="input-group">
                                <input required type="text" v-model="add_form.address_line_2" class="form-control" id="address_line_2" :placeholder="$t('account.addresses.add_card.address2')">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="city">{{$t("account.addresses.add_card.city")}}</label>
                            <div class="input-group">
                                <input required type="text" v-model="add_form.city" class="form-control" id="city" :placeholder="$t('account.addresses.add_card.city')">
                            </div>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="Country">{{$t("account.addresses.add_card.country")}}</label>
                            <div class="input-group">
                                <input required type="text" v-model="add_form.country" class="form-control" id="Country" :placeholder="$t('account.addresses.add_card.country')">
                            </div>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="mobile">{{$t("account.addresses.add_card.mobile")}}</label>
                            <div class="input-group">
                                <input required type="text" v-model="add_form.mobile" class="form-control" id="mobile" :placeholder="$t('account.addresses.add_card.mobile')">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telephone">{{$t("account.addresses.add_card.telephone")}}</label>
                            <div class="input-group">
                                <input required type="text" v-model="add_form.telephone" class="form-control" id="telephone" :placeholder="$t('account.addresses.add_card.telephone')">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="postal_code">{{$t("account.addresses.add_card.postal_code")}}</label>
                            <div class="input-group">
                                <input required type="text" v-model="add_form.postal_code" class="form-control" id="postal_code" :placeholder="$t('account.addresses.add_card.postal_code')">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button  @click="setSelectedAddress(this.add_form)" class="btn d-flex w-50 text-center justify-content-center btn-primary">{{$t("account.addresses.add_card.save")}}</button>
                    </div>
<!--                </form>-->
            </div>
        </div>
    </div>

</template>


<script>
    import {useForm} from "@inertiajs/inertia-vue3";

    export  default  {
        props : [
            'models',
            'card_class'
        ],
        created() {
                if(this.models && this.models.length) {
                    this.setSelectedAddress(this.models[0])
                    this.selectedA = this.models[0];
                }

                this.add = (this.selectedA === null);

        },
        data(){
            return {
                selectedA : null,
                sModels : this.models ? this.models : [],
                add_form : {
                    address_line_1: '',
                    address_line_2: '',
                    city : '',
                    postal_code : '',
                    country : '',
                    mobile : '',
                    telephone : '',
                    toCreate : true
                },
                add : false,

        }
        },
        methods : {
            setSelectedAddress(model){
                    this.selectedA = model;
                    if(model.toCreate) {
                        if(!this.sModels.length)
                            this.sModels.push(model);
                        this.add = false;
                    }
                    this.$emit('SetSelectedAddress', model);

            }
    }
    }
</script>
