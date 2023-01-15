<script setup>

    import updateAddress from '@/Pages/Account/Address/updateAddress.vue'
    import { Inertia } from '@inertiajs/inertia';

    defineProps({
        model: Object,
    });

    const deleteModel  = (model) => {

        Inertia.delete(route('address.destroy',{ address : model.id}),{
            onSuccess : () => {
                $('#delete-address-modal-'+ model.id).modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            }
        })
    }

</script>

<template>

    <div  class="ltn__modal-area">
    <div class="modal fade" :id="'delete-address-modal-'+model.id" tabindex="-1" role="dialog" aria-labelledby="delete-address" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form  @submit.prevent="deleteModel(model)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title m-2" id="delete-address">{{$t("account.addresses.delete_card.title")}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="btn-danger" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0 text-black">{{$t("account.addresses.delete_card.content")}}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn d-flex w-50 text-center justify-content-center btn-outline-danger" data-dismiss="modal">{{$t("account.addresses.add_card.cancel")}}
                        </button><button type="submit" class="btn d-flex w-50 text-center justify-content-center btn-danger">{{$t("account.addresses.delete_card.delete")}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</template>
