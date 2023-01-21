<script>
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    // import Datatable from '@/Pages/Admin/DataTable/Datatable.vue';
    import {Inertia} from "@inertiajs/inertia";
    import {InertiaLink, useForm} from "@inertiajs/inertia-vue3";
    import addReview from '@/Pages/Admin/Reviews/addReview.vue';
    import editReview from '@/Pages/Admin/Reviews/editReview.vue';
    import childReview from '@/Pages/Admin/Reviews/childReview.vue';
    import Main from '@/Pages/Admin/Messages/main.vue';
    import Left from '@/Pages/Admin/Messages/left.vue';

    export default {
        components: {
            AdminLayout,
            InertiaLink,
            addReview,
            editReview,
            childReview
            // Main,
            // Left
            // Datatable,
            // addUser,
            // editUser,
            // deleteBlog
        },
        mounted() {

            let app = this;
            let modal = $('#edit_booking');
            modal.on('hidden.bs.modal',function (){
                app.$emit('ResetModel');
            })
        },
        methods: {
            ShowEditModelR : function(data){
                  if(data.child_id)
                  {
                      this.modelToReplay = data;
                      console.log("this.modelToReplay");
                      console.log(this.modelToReplay);
                      let modal = $('#edit_reply');
                      this.form.comment = data.comment;
                      modal.modal('show');
                  }
                  else {
                      this.ShowEditModel(data);
                  }
            },
            submit : function () {
                // this.form
                let app = this;
                this.form.transform((data) => ({
                    comment : data.comment,
                    child_id : this.modelToReplay.id
                })).post(route('admin.review.reply'), {
                    onFinish: () => {
                    },
                    onSuccess : () => {
                        $('#edit_booking').modal('hide');
                        app.resetModel();
                    }
                });
            },
            submitU : function () {
                // this.form
                let app = this;
                this.form.transform((data) => ({
                    comment : data.comment,
                    child_id : this.modelToReplay.child_id
                })).patch(route('admin.review.reply.update',{
                    id : this.modelToReplay.id
                }), {
                    onFinish: () => {
                    },
                    onSuccess : () => {
                        $('#edit_reply').modal('hide');
                        app.resetModel();
                    }
                });
            },
            ShowEditModel : function (data){
                this.modelToUpdate = data;
            },
            resetModel : function (){
                this.modelToUpdate = null;
                this.modelToShow = null;
                this.modelToDelete = null;
                this.modelToAdd = null;
                this.modelToReplay = null;
            },
            dreview: function (id) {
                Inertia.delete(this.route('admin.reviews.destroy', {
                    review: id
                }), {}, {
                    preserveScroll: true,
                    onSuccess: () => {
                    }
                })
            },
            ShowAddModel : function (){
                this.modelToAdd = true;
            },
            ShowReplyModel : function (data){
                this.modelToReplay = data;
                let modal = $('#edit_booking');
                    modal.modal('show');
                },
            areview: function (rv) {
                console.log(!rv.approved);
                Inertia.post(this.route('admin.approve.review', {}), {
                    review_id: rv.id,
                    approved: !rv.approved
                }, {
                    preserveScroll: true,
                    onSuccess: (res) => {
                    }
                })
            }
        },
        data() {
            return {
                form : useForm({
                    comment : '',
                    child_id : this.modelToReplay?.id
                }),
                modelToUpdate: null,
                modelToShow: null,
                modelToDelete: null,
                modelToAdd: null,
                modelToReplay : null
            }
        },
        computed: {
            model: function () {
                return this.modelToAdd !== null
            }
        }
    }


</script>

<template>
    <AdminLayout :title="'Reviews'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Reviews
            </h2>
        </template>
        <div class="container-fluid">
            <div class="row">
                <div v-if="$can('add review')"  class="ml-auto mr-3">
                    <button @click="ShowAddModel" class=" btn btn btn-rounded m-2 btn-primary"><h6><i class="feather-plus"></i>Add</h6>
                    </button>
                </div>
                <div class="col-xl-12">
                    <div v-for="review in $page.props.comments.data" :key="review.id" class="card mb-4 order-list">
                        <div class="gold-members p-4">
                            <a href="#">
                            </a>
                            <div class="media">
                                <a href="#">
                                    <img class="mr-4" :src="review.commentable.fimage" alt="Generic placeholder image">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <span class="float-right text-success">{{review.date}} <i
                                            class="feather-clock text-success"></i></span>
                                    </a>
                                    <h6 class="mb-1">{{review.name}}</h6>
                                    <p class="text-black mb-3"><i class="feather-user"></i> by {{review.by}}
                                    </p>
                                    <p class="text-black-50">{{review.comment}}</p>
                                    <hr>
                                    <div class="float-right">
                                        <a v-if="$can('replay review')" href="javascript:void(0)" class="btn btn-sm btn-success" @click="ShowReplyModel(review)"><i class="fa fa-fw fa-reply"></i> Reply to this
                                            review</a>

                                        <a v-if="$can('edit review') && review.commenter.is_admin" href="javascript:void(0)" @click="ShowEditModel(review)"
                                           class="btn btn-sm btn-warning"><i class="feather-edit"></i>Edit</a>

                                        <a v-if="$can('edit review')" href="javascript:void(0)" @click="areview(review)"
                                           :class="'btn btn-sm ' + (review.approved ? 'btn-dark' : 'btn-primary') "><i
                                            :class="review.approved ? 'feather-x-circle' : 'feather-check-circle'"></i>
                                            {{review.approved ? 'Disapprove' : 'Approve'}}</a>
                                        <a v-if="$can('delete review')" href="javascript:void(0)" @click="dreview(review.id)"
                                           class="btn btn-sm btn-danger"><i class="feather-trash"></i> Cancel</a>
                                    </div>
                                    <p class="mb-0 text-dark pt-2"><span class="text-dark font-weight-bold"> Rate</span>
                                        <span class="bg-warning px-2 py-1 rounded ml-1"> {{review.rate}} </span>
                                    </p>
                                </div>
                            </div>

                            <childReview v-if="$can('view replays')" @ShowEditModel="ShowEditModelR" @ShowReplyModel="ShowReplyModel" @dreview="dreview" @areview="areview" :review="review"/>

                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
<!--                        <ul class="pagination pagination-sm mb-4 justify-content-center">-->
<!--                            <li class="page-item disabled">-->
<!--                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>-->
<!--                            </li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--                            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                            <li class="page-item">-->
<!--                                <a class="page-link" href="#">Next</a>-->
<!--                            </li>-->
<!--                        </ul>-->

                        <div v-if="$page.props.comments.links.length > 3">
                            <ul class="pagination pagination-sm mb-4 justify-content-center">
                                <template v-for="(link, key) in $page.props.comments.links">
                                <li v-if="link.url === null" :key="key+ 'url'" class="page-link" v-html="link.label"/>
                                <inertia-link v-else class="page-link" :key="key+ 'urllink'"
                                              :class="{ 'bg-white': link.active }" :href="link.url"
                                              v-html="link.label"/>
                                </template>
                            </ul>
                        </div>
                        <!--                            </div>-->
                    </nav>
                    <addReview @ResetModel="resetModel" v-if="model" :model="modelToAdd"></addReview>
                    <editReview @ResetModel="resetModel" v-if="modelToUpdate" :model="modelToUpdate"></editReview>
                    <!-- Edit Booking Modal -->
                    <div  class="modal fade" id="edit_booking" tabindex="-1" role="dialog" aria-labelledby="edit_bookingLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edit_bookingLabel">Reply to review</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group m-0">
                                        <textarea v-model="form.comment" cols="60" rows="6" class="form-control" spellcheck="false"></textarea>
                                        <div v-show="form.errors.comment">
                                            <p class="text-sm " style="color: red">
                                                {{ form.errors.comment }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-primary btn-block" @click="submit()">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  class="modal fade" id="edit_reply" tabindex="-1" role="dialog" aria-labelledby="edit_bookingLabelReplay" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edit_bookingLabelReplay">Update reply</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group m-0">
                                        <textarea v-model="form.comment" cols="60" rows="6" class="form-control" spellcheck="false"></textarea>
                                        <div v-show="form.errors.comment">
                                            <p class="text-sm " style="color: red">
                                                {{ form.errors.comment }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-primary btn-block" @click="submitU()">Update</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AdminLayout>
</template>
