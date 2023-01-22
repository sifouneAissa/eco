<template>
    <div v-if="review.children">
        <div v-for="child in review.children"   class="media mt-3 ml-5">
            <div class="col-12">
                <div>
                    <div class="mr-4 dropdown-list-image mr-3 d-flex align-items-center bg-danger justify-content-center rounded-circle text-white">{{child.uname[0]}}</div>
                </div>
                <div class="media-body">
                    <a href="#">
                                        <span class="float-right text-success">{{child.date}} <i
                                            class="feather-clock text-success"></i></span>
                    </a>
                    <i  class="fa fa-fw fa-reply text-primary"></i>
                    <p class="text-black mb-3"><i class="feather-user"></i> by {{child.by}}
                    </p>
                    <p class="text-black-50">{{child.comment}}</p>
                    <hr>
                    <div class="float-right">
<!--                        <a href="javascript:void(0)" class="btn btn-sm btn-success" @click="ShowReplyModel(child)"><i class="fa fa-fw fa-reply"></i> Reply to this-->
<!--                            review</a>-->

                        <a  v-if="$can('edit replay') && child.commenter &&  child.commenter.is_admin" href="javascript:void(0)" @click="ShowEditModel(child)"
                           class="btn btn-sm btn-warning"><i class="feather-edit"></i>Edit</a>

                        <a v-if="$can('edit replay')" href="javascript:void(0)" @click="areview(child)"
                           :class="'btn btn-sm ' + (child.approved ? 'btn-dark' : 'btn-primary') "><i
                            :class="child.approved ? 'feather-x-circle' : 'feather-check-circle'"></i>
                            {{child.approved ? 'Disapprove' : 'Approve'}}</a>
                        <a v-if="$can('delete replay')" href="javascript:void(0)" @click="dreview(child.id)"
                           class="btn btn-sm btn-danger"><i class="feather-trash"></i> Cancel</a>
                    </div>
                </div>
<!--                <div class="col-12 mt-5">-->
<!--                    <childReview :review="child"/>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props : ['review'],
        methods : {
            ShowReplyModel : function (review){
                this.$emit('ShowReplyModel',review);
            },
            ShowEditModel : function (review){
                this.$emit('ShowEditModel',review);
            },
            dreview : function (id){
                this.$emit('dreview',id);
            },
            areview : function (review){
                this.$emit('areview',review);
            }
        }
    }
</script>
