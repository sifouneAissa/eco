<template>
    <li class="nav-item dropdown no-arrow mx-1 osahan-list-dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">
            <i class="feather-bell"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-info badge-counter">{{count}}</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div id="mydropadmin" class="dropdown-list dropdown-menu dropdown-menu-right shadow-sm">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            <div v-for="(notification,index) in notifications" :key="notification.id">
                <a @click="go(notification.data.order)" v-if="index<6" :class="'dropdown-item d-flex align-items-center ' + (!notification.read_at ? 'bg-light' : '')" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-box-open text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">{{notification.date}}</div>
                        <span class="font-weight-bold">A new order {{notification.data.order.order_number}} by {{notification.data.order.user.name}}</span>
                    </div>
                </a>
            </div>
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
        </div>
    </li>
</template>
<script>
    import {useForm} from "@inertiajs/inertia-vue3";
    import {Inertia} from '@inertiajs/inertia';

    export default {
        mounted() {

            Echo.private("App.Models.User." + this.$page.props.auth.id).notification((notification) => {
                this.notifications.unshift(notification.notification);
            });

            var dropdown = $('#mydropadmin');
            let app = this;

            $(document).click(function(e){
                // check if the drop down is closed
                if ( (!$(e.target).is(dropdown)) || !$(e.target).closest('#el').length ) {
                    if(app.count)
                        app.readall();
                }
            });

        },
        data() {
            return {
                notifications: this.$page.props.notifications,
            }
        },

        computed: {
            count: function () {
                return this.unreaded.length;
            },
            unreaded: function () {
                return this.notifications.filter((item) => item.read_at === null);
            }

        },
        methods: {
            go : function (order){
                Inertia.visit(this.route('admin.order.show',
                    {id : order.id}));
            },
            getOrderStatus(s) {
                let status = {
                    delivered: 'confirmed',
                    onway: 'in way',
                    instore: 'received'
                }

                return status[s];
            },
            readall() {
                useForm().post(route('notification.readall'), {
                    onSuccess: (res) => {
                        this.notifications = res.props.notifications
                    },
                });
            }
        }

    }
</script>
