<template>
    <div>
        <a @click="readall()" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <span class="badge badge-danger badge-counter">{{count}}</span>
        </a>
        <div class="dropdown-menu dropdown-cart-top p-0 dropdown-menu-right shadow-sm border-0 ">

            <div class="dropdown-cart-top-body border-top p-4">
                <div v-for="notification in notifications" :key="notification.id">
                    <p class="mb-2"><i :class="'icofont-ui-press food-item '+ (notification.read_at ? 'text-success' : 'text-danger')"></i>{{"#"+notification.data.info.order.id}} is {{getOrderStatus(notification.data.info.status)}}   <span class="float-right text-secondary"></span></p>
                </div>
            </div>
        </div>

    </div>
</template>

<script >
    import  {useForm} from '@inertiajs/inertia-vue3';

    export default  {
        mounted() {

            Echo.private("App.Models.User." + this.$page.props.auth.id).notification((notification) => {
                    this.notifications.push(notification.notification);
            });
        },
        data (){
            return {
                notifications : this.$page.props.auth.notifications,
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
                useForm().post(route('notification.readall'));
            }
        }
    }
</script>
