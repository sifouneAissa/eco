
<template>
    <Update @resetModel="resetModel"  :id="'edit-comment'" title="Edit Review">
        <div  class="modal-body mx-3 bg" >
<!--            <form >-->
                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Review</label>
                        <textarea class="form-control" v-model="form.comment" placeholder="Review comment"></textarea>
                        <div v-show="form.errors.comment">
                            <p class="text-sm " style="color: red">
                                {{ form.errors.comment }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Type</label>
                        <multiselect
                            v-model="form.type"
                            :options="$page.props.types"
                            label="name"
                            track-by="name"
                            :multiple="false"
                            placeholder="Select Type"
                        ></multiselect>
                        <div v-show="!form.type  && this.submited">
                            <p class="text-sm " style="color: red">
                                {{ errors.type }}
                            </p>
                        </div>
                    </div>
                </div>
                <div v-if="form.type" class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Commentable</label>
                        <multiselect
                            v-model="form.commentable"
                            :options="form.type.values"
                            label="name"
                            track-by="name"
                            :multiple="false"
                            placeholder="Select Commentable"
                        ></multiselect>
                        <div v-show="!form.commentable && this.submited">
                            <p class="text-sm " style="color: red">
                                {{ errors.commentable }}
                            </p>
                        </div>
                    </div>
                </div>
                <div  class="mb-5 form-label-group">
                    <div class="form-group">
                        <label>Rate</label>
                        <multiselect
                            v-model="form.rate"
                            :options="reviewsS"
                            label="name"
                            track-by="name"
                            :multiple="false"
                            placeholder="Select Rate"
                        ></multiselect>
                        <div v-show="form.errors.rate">
                            <p class="text-sm " style="color: red">
                                {{ form.errors.rate }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class=form-group>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input v-model="form.approved" type="checkbox" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label " for="customRadioInline1">Approved</label>
                    </div>
                </div>


                <div class="modal-footer d-flex  ">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">{{$t("account.addresses.add_card.cancel")}}
                    </button><button  type="submit" class="btn btn-primary" @click="submit">{{$t("account.addresses.add_card.save")}}</button>
                </div>
<!--            </form>-->

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

        computed : {
            reviewsS : function () {
                return [
                    {
                        name : '★',
                        id : 1
                    },
                    {
                        name : '★★',
                        id : 2
                    },
                    {
                        name : '★★★',
                        id : 3
                    },
                    {
                        name : '★★★★',
                        id : 4
                    },
                    {
                        name : '★★★★★',
                        id : 5
                    },
                ];
            }
        },
        props : ['model'],
        mounted() {
            this.form.rate = this.reviewsS?.find((item) => item.id === this.model.rate);
            // this.form.commentable = this.model.commentable;
            let app = this;
            let modal = $('#edit-comment');
            modal.on('hidden.bs.modal',function (){
                app.$emit('ResetModel');
            })
            modal.modal('show');

            console.log(this.form);


        },
        data(){
            return {
                submited : false,
                errors : {
                    type : 'Select Type',
                    commentable : 'Select Commentable'
                },

                form : useForm({
                    approved : this.model.approved,
                    rate : 1,
                    comment : this.model.comment,
                    type : this.$page.props.types.find((item) => item.name === this.model.type),
                    commentable : this.model.commentable
                }),
                selected : null,
                // options: this.$page.props.permissions.map(function (item){return {name : item.name,id : item.id};})
            }

        },
        methods : {
            resetModel : function (){
                this.$emit('ResetModel');
            },
            submit : function () {
                // this.form
                this.submited = true;

                if(this.form.commentable)
                this.form.transform((data) => ({
                    approved : data.approved,
                    rate : data.rate.id,
                    comment : data.comment,
                    commentable_type : data.commentable.cclass,
                    commentable_id : data.commentable.id
                })).patch(route('admin.reviews.update',{review : this.model.id}), {
                    onFinish: () => {
                    },
                    onSuccess : () => {

                        $('#edit-comment').modal('hide');

                        this.$emit('ResetModel');
                    }
                });
            }
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
