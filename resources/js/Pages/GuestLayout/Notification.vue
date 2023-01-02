<template>
    <div v-if="!$page.props.auth.is_admin">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="badge badge-danger badge-counter">{{count}}</span>
        </a>
        <div id="mydrop" class="dropdown-menu dropdown-cart-top p-0 dropdown-menu-right shadow-sm border-0 ">

            <div class="dropdown-cart-top-body border-top p-4">
                <div  v-for="(notification,index) in notifications" :key="notification.id">
                    <div v-if="index<6">
                        <div  >
                            <div class="small text-gray-500">{{notification.date}}</div>
                            <!--                        <span class="font-weight-bold">A new monthly report is ready to download!</span>-->
                        </div>
                        <p class="mb-2"><i :class="'icofont-ui-press food-item '+ (notification.read_at ? 'text-success' : 'text-danger')"></i>Order {{"#"+notification.data.info.order.id}} is {{getOrderStatus(notification.data.info.status)}}   <span class="float-right text-secondary"></span></p>

                    </div>
                </div>
            </div>

            <div class="dropdown-cart-top-footer border-top p-2">
                <a class="btn btn-success btn-block btn-lg" href="#">View All {{notifications.length}} notifications</a>
            </div>
        </div>

    </div>
</template>

<script >
    import  {useForm} from '@inertiajs/inertia-vue3';

    export default  {
        mounted() {

            Echo.private("App.Models.User." + this.$page.props.auth.id).notification((notification) => {
                    this.notifications.unshift(notification.notification);
            });

            var dropdown = $('#mydrop');
            let app = this;

            $(document).click(function(e){
                // check if the drop down is closed
                if ( (!$(e.target).is(dropdown)) || !$(e.target).closest('#el').length ) {
                    if(app.count)
                    app.readall();
                }
            });
        },
        data (){
            return {
                notifications : this.$page.props.notifications,
            }
        },
        computed : {
            count : function (){
                return this.unreaded.length;
            },
            unreaded : function (){
                return this.notifications.filter((item) => item.read_at===null);
            }

        },
        methods : {
            getOrderStatus(s){
                let status = {
                    delivered : 'confirmed',
                    onway : 'in way',
                    instore : 'received'
                }

                return status[s];
            },
            readall(){
                useForm().post(route('notification.readall'),{
                    onSuccess: (res) => {
                        this.notifications = res.props.notifications
                    },
                });
            }
        }
    }
</script>
