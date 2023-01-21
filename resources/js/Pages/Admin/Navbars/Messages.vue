<template>

    <li class="nav-item dropdown no-arrow mx-1 osahan-list-dropdown">

        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">
            <i class="feather-message-square"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">{{count}}</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div id="mydropadminmessage" class="dropdown-list dropdown-menu dropdown-menu-right shadow-sm">
            <h6 class="dropdown-header">
                Message Center
            </h6>
            <div v-for="(notification,index) in notifications" :key="notification.id">
                <a @click="go()" v-if="index<6" :class="'dropdown-item d-flex align-items-center ' + (!notification.read_at ? 'bg-light' : '')" href="#">
                    <div class="dropdown-list-image mr-3">
                        <div class="dropdown-list-image mr-3 d-flex align-items-center bg-danger justify-content-center rounded-circle text-white">{{notification.data.message.name[0]}}</div>
<!--                        <div class="status-indicator bg-success"></div>-->
                    </div>
<!--                    <div>-->
<!--                        <div class="small text-gray-500">{{notification.date}}</div>-->
<!--                        <span class="font-weight-bold">A new order {{notification.data.order.order_number}} by {{notification.data.order.user.name}}</span>-->
<!--                    </div>-->
                    <div class="font-weight-bold overflow-hidden">
                        <div class="text-truncate">{{notification.data.message.message}}</div>
                        <div class="small text-gray-500">{{notification.date}}</div>
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
                console.log('check',notification);
                if(notification.notification.data.message)
                this.notifications.unshift(notification.notification);
            });

            var dropdown = $('#mydropadminmessage');
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
                notifications: this.$page.props.nmessages,
            }
        },

        computed: {
            count: function () {
                return this.unreaded.length;
            },
            unreaded: function () {
                return this.notifications.filter((item) => (item.read_at === null));
            }

        },
        methods: {
            go : function (){
                Inertia.visit(this.route('admin.message.index'));
            },
            readall() {
                useForm().post(route('notification.readAllMessages'), {
                    onSuccess: (res) => {
                        this.notifications = res.props.nmessages;
                    },
                });
            }
        }

    }
</script>
