<template>
    <div v-if="this.$page.props.smessage" class="col-lg-7 col-xl-8 px-0">
        <div class="p-3 d-flex align-items-center  border-bottom osahan-post-header">
            <div class="font-weight-bold mr-1 overflow-hidden">
                <div class="text-truncate">{{this.$page.props.smessage.name}}
                </div>
                <div class="small text-truncate overflow-hidden text-black-50">{{this.$page.props.smessage.email}} , {{this.$page.props.smessage.phone}}</div>
            </div>
            <span class="ml-auto">
<!--                                          <button type="button" class="btn btn-outline-primary btn-sm rounded">-->
<!--                                          <i class="feather-phone"></i>-->
<!--                                          </button>-->
<!--                                          <button type="button" class="btn btn-outline-primary btn-sm rounded">-->
<!--                                          <i class="feather-video"></i>-->
<!--                                          </button>-->
                                          <div class="btn-group">
                                             <button type="button" class="btn btn-outline-primary btn-sm rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="feather-more-vertical"></i>
                                             </button>
                                             <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" type="button"><i class="feather-trash"></i> Delete</button>
<!--                                                <button class="dropdown-item" type="button"><i class="feather-x-circle"></i> Turn Off</button>-->
                                             </div>
                                          </div>
                                       </span>
        </div>
        <div class="osahan-chat-box p-3 border-top border-bottom bg-light">
<!--            <div class="text-center my-3">-->
<!--                <span class="px-3 py-2 small bg-white shadow-sm  rounded">DEC 21, 2020</span>-->
<!--            </div>-->
<!--            <div class="d-flex align-items-center osahan-post-header">-->
<!--                <div class="dropdown-list-image mr-3 mb-auto"><img class="rounded-circle" src="img/user/2.png" alt=""></div>-->
<!--                <div class="mr-1">-->
<!--                    <div class="text-truncate h6 mb-3">Carl Jenkins-->
<!--                    </div>-->
<!--                    <p>Hi Marie</p>-->
<!--                    <p>welcome to Live Chat! My name is Jason. How can I help you today?-->
<!--                        <a href="#">iamosahan@gmail.com</a>-->
<!--                    </p>-->
<!--                </div>-->
<!--                <span class="ml-auto mb-auto">-->
<!--                                             <div class="text-right text-muted pt-1 small">00:21PM</div>-->
<!--                                          </span>-->
<!--            </div>-->
<!--            <div class="text-center my-3">-->
<!--                <span class="px-3 py-2 small bg-white shadow-sm rounded">DEC 22, 2020</span>-->
<!--            </div>-->
<!--            <div class="d-flex align-items-center osahan-post-header">-->
<!--                <div class="dropdown-list-image mr-3 mb-auto"><img class="rounded-circle" src="img/p8.png" alt=""></div>-->
<!--                <div class="mr-1">-->
<!--                    <div class="text-truncate h6 mb-3">Jack P. Angulo-->
<!--                    </div>-->
<!--                    <p>Hi, I wanted to check my order status. My order number is 0009483021 😀</p>-->
<!--                </div>-->
<!--                <span class="ml-auto mb-auto">-->
<!--                                             <div class="text-right text-muted pt-1 small">00:21PM</div>-->
<!--                                          </span>-->
<!--            </div>-->
<!--            <div class="text-center my-3">-->
<!--                <span class="px-3 py-2 small bg-white shadow-sm rounded">DEC 23, 2020</span>-->
<!--            </div>-->
<!--            <div class="d-flex align-items-center osahan-post-header">-->
<!--                <div class="dropdown-list-image mr-3 mb-auto"><img class="rounded-circle" src="img/user/2.png" alt=""></div>-->
<!--                <div class="mr-1">-->
<!--                    <div class="text-truncate h6 mb-3">Carl Jenkins-->
<!--                    </div>-->
<!--                    <p>Is there anything else that I can do for you?</p>-->
<!--                    <p>wI understand your concern… I wouldn’t want my child’s gift to arrive late either. It looks like your order is set to arrive in 2 business days, so it should arrive by Friday, just in time!</p>-->
<!--                </div>-->
<!--                <span class="ml-auto mb-auto">-->
<!--                                             <div class="text-right text-muted pt-1 small">00:21PM</div>-->
<!--                                          </span>-->
<!--            </div>-->
<!--            <div class="text-center my-3">-->
<!--                <span class="px-3 py-2 small bg-white shadow-sm rounded">DEC 24, 2020</span>-->
<!--            </div>-->
            <div class="d-flex align-items-center osahan-post-header">
<!--                <div class="dropdown-list-image mr-3 mb-auto"><img class="rounded-circle" src="img/p8.png" alt=""></div>-->
                <div class="mr-1">
<!--                    <div class="text-truncate h6 mb-3">Jack P. Angulo-->
<!--                    </div>-->
                    <p>{{$page.props.smessage.message}}
                    </p>
                </div>
                <span class="ml-auto mb-auto">
                                             <div class="text-right text-muted pt-1 small">{{$page.props.smessage.date}}</div>
                                          </span>
            </div>
        </div>
        <div class="w-100 border-top border-bottom">
            <textarea placeholder="Write a message…" class="form-control border-0 p-3 shadow-none" rows="2"></textarea>
        </div>
        <div class="p-3 d-flex align-items-center">
            <div class="overflow-hidden">
                <button type="button" class="btn btn-outline-primary btn-sm rounded">
                    <i class="feather-image"></i>
                </button>
                <button type="button" class="btn btn-outline-primary btn-sm rounded">
                    <i class="feather-paperclip"></i>
                </button>
                <button type="button" class="btn btn-outline-primary btn-sm rounded">
                    <i class="feather-camera"></i>
                </button>
            </div>
            <span class="ml-auto">
                                       <button type="button" class="btn btn-primary btn-sm rounded">
                                       <i class="feather-send"></i> Send
                                       </button>
                                       </span>
        </div>
    </div>
    <div v-else>
        Select a message
    </div>
</template>
<script>
    export default {
        data (){
            return {
            }
        }
    }
</script>
