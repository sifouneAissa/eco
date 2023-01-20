<template>

    <div class="border-right col-lg-5 col-xl-4 px-0">
        <div class="osahan-chat-left">
            <div class="position-relative icon-form-control p-3 border-bottom">
                <i class="feather-search position-absolute"></i>
                <input placeholder="Search messages" type="text" class="form-control">
            </div>
            <div class="osahan-chat-list">
                <div @click="setMessage(message)"  v-for="message in $page.props.messages" :class=" ( !message.read_at ? 'bg-warning' : '') + ' p-3 d-flex align-items-center border-bottom osahan-post-header overflow-hidden ' + (($page.props.smessage && $page.props.smessage.id===message.id) ? '' : 'bg-white') ">
                    <div  class="dropdown-list-image mr-3 ">
                        <div class="dropdown-list-image mr-3 d-flex align-items-center bg-danger justify-content-center rounded-circle text-white">{{message.name[0]}}</div>
                    </div>
                    <div class="font-weight-bold mr-1 overflow-hidden ">
                        <div class="text-truncate">{{message.name}}</div>
                        <div class="small text-truncate overflow-hidden text-black-50"><i class="feather-check text-primary "></i>{{message.message}}</div>
                    </div>
                    <span class="ml-auto mb-auto">
                                                <div class="text-right text-muted pt-1 small">{{message.date}}</div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {Inertia} from "@inertiajs/inertia";

    export default  {
        methods : {
            setMessage : function (message){
                let app = this;
                if(!message.read_at)
                Inertia.patch(this.route('admin.message.read_at',{
                    id : message.id
                }),{},{
                    onSuccess : () => {
                        app.$page.props.smessage = message;
                    },
                    preserveScroll : true
                });
                else this.$page.props.smessage = message;
            }
        }
    }
</script>
