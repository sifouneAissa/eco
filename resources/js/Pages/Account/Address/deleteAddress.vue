<script setup>

    import updateAddress from '@/Pages/Account/Address/updateAddress.vue'
    import { Inertia } from '@inertiajs/inertia';

    defineProps({
        model: Object,
    });

    const deleteModel  = (model) => {

        $('#delete-address-modal-'+ model.id).modal('hide');
        Inertia.delete(route('address.destroy',{ address : model.id}))
    }

</script>

<template>
    <div class="modal fade" :id="'delete-address-modal-'+model.id" tabindex="-1" role="dialog" aria-labelledby="delete-address" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <form  @submit.prevent="deleteModel(model)">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delete-address">Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0 text-black">Are you sure you want to delete this xxxxx?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn d-flex w-50 text-center justify-content-center btn-outline-primary" data-dismiss="modal">CANCEL
                        </button><button type="submit" class="btn d-flex w-50 text-center justify-content-center btn-primary">DELETE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
