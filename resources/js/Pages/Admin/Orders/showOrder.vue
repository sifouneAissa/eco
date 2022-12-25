<template>
    <AdminLayout  :title="'Show Order'" :urls="urls">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Show Order
            </h2>
        </template>

        <div class="row">
            <div class="col-xl-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Order Details
                    </div>
                    <div class="card-body">
                        <div class="card mb-4 order-list">
                            <div class="gold-members p-4">
                                <a href="#">
                                </a>
                                <div class="media">
                                    <a href="#">
                                        <img class="mr-4" :src="order.fimage" alt="Generic placeholder image">
                                    </a>
                                    <div class="media-body">
                                        <a href="#">
                                            <span class="float-right text-success">{{order.delivered_date}}<i class="feather-check-circle text-success"></i></span>
                                        </a>
                                        <h6 class="mb-3"><a href="#">
                                        </a><a href="detail.html" class="text-dark">{{order.names}}
                                        </a>
                                        </h6>
                                        <p class="text-black-50 mb-1"><i class="feather-map-pin"></i> {{order.address.address_line_1}}, {{order.address.city}}, {{order.address.country}}
                                        </p>
                                        <p class="text-black-50 mb-3"><i class="feather-list"></i> ORDER {{order.order_number}} <i class="feather-clock ml-2"></i> {{order.created_date}}</p>
                                        <p class="text-dark">{{order.qnames}}
                                        </p>
                                        <hr>
                                        <div class="float-right">
<!--                                            <a href="messages.html" class="btn btn-sm btn-warning"><i class="feather-message-circle"></i> Message</a>-->
                                            <i v-if="order.received" class="feather-check-circle"></i>
                                            <a @click="submit('instore')" class="btn btn-sm btn-success m-1"><i class="feather-check-circle"></i> Order Received</a>
                                            <i v-if="order.confirmed" class="feather-check-circle"></i>
                                            <a @click="submit('onway')" class="btn btn-sm btn-info m-1" data-toggle="modal" data-target="#edit_booking"><i class="feather-truck"></i> Order Confirmed</a>
                                            <i v-if="order.picked_up" class="feather-check-circle text-success"></i>
                                            <a @click="submit('delivered')" class="btn btn-sm btn-outline-success m-1"><i class="feather-user-check"></i> Order Picked Up</a>
                                        </div>
                                        <p class="mb-0 text-dark text-dark pt-2"><span class="text-dark font-weight-bold"> Total Paid:</span>  {{order.total}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
<!--                                    <th>Options</th>-->
<!--                                    <th>Edit</th>-->
<!--                                    <th>Price</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="item in order.order_items" :key="item.id">
                                    <td>{{item.id}}</td>
                                    <td>{{item.product.name}}</td>
                                    <td>{{item.quantity}}</td>
<!--                                    <td>$12</td>-->
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-end total_order">
                            <div class="col-xl-3 col-lg-4 col-md-5">
                                <ul class="list-unstyled text-muted font-weight-bold">
<!--                                    <li class="d-flex align-items-center justify-content-between">-->
<!--                                        <span>Subtotal</span> $40.00-->
<!--                                    </li>-->
<!--                                    <li class="d-flex align-items-center justify-content-between">-->
<!--                                        <span>Delivery Fee</span> $7.00-->
<!--                                    </li>-->
                                    <li class="d-flex align-items-center justify-content-between text-danger">
                                        <span>Total</span> {{order.total}}
                                    </li>
                                </ul>
<!--                                <a href="#0" class="btn btn-success btn-block">Place Order</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

<script>

    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    import {useForm} from "@inertiajs/inertia-vue3";
    export default {
        name: "showOrder.vue",
        components : {
            AdminLayout
        },
        methods :{
            submit : function (status) {
                // this.form
                this.form.status = status;
                this.form.post(route('admin.trackorder.store',{}), {
                    onFinish: () => {
                    },
                    onSuccess : () => {

                    }
                });
            }
        },
        props : ['order'],
        data(){
            return {
                form : useForm({
                    status : '',
                    order_id : this.order.id
                }),
                urls : [
                    {
                        name : 'Orders',
                        route : this.route('admin.order.index')
                    },
                    {
                        name : 'Show order '+this.$page.props.order.id,
                        route : "#"
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>
