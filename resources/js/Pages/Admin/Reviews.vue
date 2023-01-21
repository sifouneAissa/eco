<script>
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    // import Datatable from '@/Pages/Admin/DataTable/Datatable.vue';
    import {Inertia} from "@inertiajs/inertia";
    // import editUser from '@/Pages/Admin/Clients/editUser.vue';
    // import showRole from '@/Pages/Admin/Roles/showRole.vue';
    // import deleteBlog from '@/Pages/Admin/Blogs/deleteBlog.vue';
    import Main from '@/Pages/Admin/Messages/main.vue';
    import Left from '@/Pages/Admin/Messages/left.vue';

    export default {
        components :{
            AdminLayout,
            // Main,
            // Left
            // Datatable,
            // addUser,
            // editUser,
            // deleteBlog
        } ,
        props : ['datatableUrl','datatableColumns','datatableHeaders'],
        mounted() {
            console.log(this.$page.props.comments);
        },
        methods :{
            dreview : function (id){
                Inertia.delete(this.route('admin.reviews.destroy',{
                    review : id
                }),{},{
                    preserveScroll : true,
                    onSuccess : () => {}
                })
            },
            areview : function (rv){
                console.log(!rv.approved);
                Inertia.patch(this.route('admin.reviews.update',{
                    review : rv.id
                }),{
                    approved : !rv.approved
                },{
                    preserveScroll : true,
                    onSuccess : (res) => {
                    }
                })
            }
        },
        data(){
            return {
                modelToUpdate : null,
                modelToShow : null,
                modelToDelete : null,
                modelToAdd : null
            }
        },
        computed : {
            model : function (){
                return this.modelToUpdate!==null
            }
        }
    }


</script>

<template>
    <AdminLayout  :title="'Reviews'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Reviews
            </h2>
        </template>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div v-for="review in $page.props.comments" :key="review.id" class="card mb-4 order-list">
                        <div class="gold-members p-4">
                            <a href="#">
                            </a>
                            <div class="media">
                                <a href="#">
                                    <img class="mr-4" :src="review.commentable.fimage" alt="Generic placeholder image">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                        <span class="float-right text-success">{{review.date}} <i class="feather-clock text-success"></i></span>
                                    </a>
                                    <h6 class="mb-1">{{review.name}}</h6>
                                    <p class="text-black mb-3"><i class="feather-user"></i> by {{review.by}}
                                    </p>
                                    <p class="text-black-50">{{review.comment}}</p>
                                    <hr>
                                    <div class="float-right">
                                        <a href="#0" class="btn btn-sm btn-success" data-toggle="modal" data-target="#edit_booking"><i class="fa fa-fw fa-reply"></i> Reply to this review</a>
                                        <a href="javascript:void(0)" @click="areview(review)" :class="'btn btn-sm ' + (review.approved ? 'btn-warning' : 'btn-primary') "><i :class="review.approved ? 'feather-x-circle' : 'feather-check-circle'"></i> {{review.approved ? 'Disapprove' : 'Approve'}}</a>
                                        <a href="javascript:void(0)" @click="dreview(review.id)" class="btn btn-sm btn-danger"><i class="feather-trash"></i> Cancel</a>
                                    </div>
                                    <p class="mb-0 text-dark pt-2"><span class="text-dark font-weight-bold"> Rate</span>  <span class="bg-warning px-2 py-1 rounded ml-1"> {{review.rate}} </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm mb-4 justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
