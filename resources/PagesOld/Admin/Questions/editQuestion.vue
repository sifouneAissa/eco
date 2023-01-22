
<template>
    <Update @resetModel="resetModel"  :id="model.modal_ids.edit" title="Edit Question">
        <div  class="modal-body mx-3 bg" >
            <form @submit.prevent="submit">
                <div class="mb-5 form-label-group"> <div class="form-group">
                    <label>Question content</label>
                    <input v-model="form.question" type="text" class="form-control" placeholder="Question Content">
                    <div v-show="form.errors.question">
                        <p class="text-sm " style="color: red">
                            {{ form.errors.question }}
                        </p>
                    </div>
                </div>
                    <div class="form-group">
                        <label>Answer content</label>
                        <input v-model="form.answer" type="text" class="form-control" placeholder="Answer Content">
                        <div v-show="form.errors.answer">
                            <p class="text-sm " style="color: red">
                                {{ form.errors.answer }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex  ">
                    <button type="button" class="btn btn-outline-warning" @click="resetModel" data-dismiss="modal">{{$t("account.addresses.add_card.cancel")}}
                    </button><button  type="submit" class="btn btn-warning">{{$t("account.addresses.add_card.save")}}</button>
                </div>
            </form>

        </div>
    </Update>
</template>
<script>
    import Update from '@/Pages/Admin/DataTable/Modals/Update.vue';
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import Multiselect from 'vue-multiselect'

    export default  {
        components : {
            Update,
            Multiselect
        },
        props : {
            model : Object
        },
        mounted() {
            let app = this;
            let modal = $('#'+this.model.modal_ids.edit);

            modal.on('hidden.bs.modal',function (){
                app.$emit('ResetModel');
            })
            modal.modal('show');
        },
        data(){
            return {
                form: useForm({
                    question: this.model.question,
                    answer: this.model.answer,
                })
            }
        },
        methods : {
            resetModel : function (){
                this.$emit('ResetModel');
            },
            submit : function () {
                // this.form
                this.form.patch(route('admin.question.update',{
                    id : this.model.id
                }), {
                    onFinish: () => {
                    },
                    onSuccess : () => {
                        $('#'+this.model.modal_ids.edit).modal('hide');
                        $('#dataTable').DataTable().ajax.reload()
                        this.$emit('ResetModel');
                    }
                });
            }
        }
    }
</script>

