<script setup>

    import updateAddress from '@/Pages/Account/Address/updateAddress.vue'
    import deleteAddress from '@/Pages/Account/Address/deleteAddress.vue'

    defineProps({
        model: Object,
    });

</script>


<template>
        <updateAddress :model="model" />
        <deleteAddress :model="model" />
        <div class="col-md-6">
            <div class="bg-white card addresses-item mb-4 border border-primary shadow">
                <div class="gold-members p-4">
                    <div class="media">
                        <div class="mr-3"><i class="icofont-location-pin icofont-3x"></i></div>
                        <div class="media-body">
                            <h6 class="mb-1 text-secondary">{{model.country}} - {{model.city}}</h6>
                            <p class="text-black">{{model.address_line_1}} {{model.address_line_2}}</p>
                            <p class="text-black">{{model.mobile}} {{model.telephone}}</p>

                            <p class="mb-0 text-black font-weight-bold"><a class="text-primary mr-3" data-toggle="modal" :data-target="'#update-address-modal-'+model.id"  href="#"><i class="icofont-ui-edit"></i> {{$t("account.addresses.edit_card.edit")}}</a> <a class="text-danger" data-toggle="modal" :data-target="'#delete-address-modal-'+model.id" href="#"><i class="icofont-ui-delete"></i> {{$t("account.addresses.delete_card.delete")}}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>
