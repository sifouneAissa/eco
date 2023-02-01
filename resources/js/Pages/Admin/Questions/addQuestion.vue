
<template>
    <Add @resetModel="resetModel"  :id="'add-question'" title="Add Question">
        <div  class="modal-body mx-3 bg" >
            <form @submit.prevent="submit">
                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Question content</label>
                        <input v-model="form.question" type="text" class="form-control" placeholder="Question Content">
                        <add-t :type="'input'" @write="write" :attr="'Question'" :keyV="'question'" :cvalues="form.langs"/>
                        <div v-show="form.errors.question">
                            <p class="text-sm " style="color: red">
                                {{ form.errors.question }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Answer content</label>
                        <input v-model="form.answer" type="text" class="form-control" placeholder="Answer Content">
                        <add-t :type="'input'" @write="write" :attr="'Answer'" :keyV="'answer'" :cvalues="form.langs"/>
                        <div v-show="form.errors.answer">
                            <p class="text-sm " style="color: red">
                                {{ form.errors.answer }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex  ">
                    <button type="button" class="btn btn-outline-primary" @click="resetModel" data-dismiss="modal">{{$t("account.addresses.add_card.cancel")}}
                    </button><button  type="submit" class="btn btn-primary">{{$t("account.addresses.add_card.save")}}</button>
                </div>
            </form>

        </div>
    </Add>
</template>
<script>
    import Add from '@/Pages/Admin/DataTable/Modals/Add.vue';
    import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
    import Multiselect from 'vue-multiselect'
    import AddT from '@/Pages/Admin/Translations/addTranslation.vue';

    export default  {
        components : {
            Add,
            Multiselect,
            AddT
        },
        props : {
        },
        mounted() {
            let app = this;
            let modal = $('#add-question');
            modal.on('hidden.bs.modal',function (){
                app.$emit('ResetModel');
            })
            modal.modal('show');
        },
        data(){
            return {
                form : useForm({
                    question: '',
                    answer: '',
                    langs : []
                }),
            }

        },
        methods : {
            write(ditem){
                this.form.langs = ditem;
            },
            resetModel : function (){
                this.$emit('ResetModel');
            },
            submit : function () {
                // this.form
                this.form .transform((data) => ({
                    question: data.question,
                    answer: data.answer,
                    langs : data.langs
                      })).post(route('admin.question.store',{}), {
                    headers: {
                        'Content-Type' : 'application/octet-stream'
                    },
                    onFinish: () => {
                    },
                    onSuccess : () => {
                        $('#add-question').modal('hide');
                        $('#dataTable').DataTable().ajax.reload()
                        this.$emit('ResetModel');
                    }
                });
            }
        }
    }
</script>
