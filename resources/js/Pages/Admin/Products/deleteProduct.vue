
<template>
    <Delete @resetModel="resetModel"  :id="model.modal_ids.delete" title="Delete Product">
        <div  class="modal-body mx-3 bg" >
            <form @submit.prevent="submit">
                <div class="modal-body">
                    <h4>Are you sure ?</h4>
                </div>

                <div class="modal-footer d-flex  ">
                    <button type="button" class="btn btn-outline-primary" @click="resetModel" data-dismiss="modal">{{$t("account.addresses.add_card.cancel")}}
                    </button><button  type="submit" class="btn btn-danger">{{$t("account.addresses.add_card.save")}}</button>
                </div>
            </form>

        </div>
    </Delete>
</template>
<script>
    import Delete from '@/Pages/Admin/DataTable/Modals/Delete.vue'

    import { Inertia } from "@inertiajs/inertia";

    export default  {
        components : {
            Delete
        },
        props : {
            model : {
                type : Object,
                default :{
                    name : 'Waiting',
                }
            }
        },
        mounted() {
            let app = this;
            let modal = $('#'+this.model.modal_ids.delete);

            modal.on('hidden.bs.modal',function (){
                app.$emit('ResetModel');
            })

            modal.modal('show');

        },
        data(){
        },
        methods : {
            resetModel : function (){
                this.$emit('ResetModel');
            },
            submit : function () {
                // this.form
                Inertia.delete(route('admin.product.destroy',{
                    id : this.model.id
                }), {
                    onFinish: () => {
                    },
                    onSuccess : () => {
                        $('#'+this.model.modal_ids.delete).modal('hide');
                        $('#dataTable').DataTable().ajax.reload()
                        this.$emit('ResetModel');
                    }
                });
            }
        }
    }
</script>

