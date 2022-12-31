<template>
        <button v-if="showMe('unordered')" @click="submit('unordered')"  class="mr-1 btn btn-warning"><h6><i class="feather-user"></i> Unordered</h6></button>
        <button v-if="showMe('unregistered')" @click="submit('unregistered')" class="mr-1 btn btn-dark"><h6><i class="feather-user-minus"></i> Unregistered</h6></button>
        <button v-if="showMe(null)" @click="submit()" class="mr-1 btn btn-light"><h6><i class="feather-user-check"></i> All</h6></button>
</template>

<script >
    import {Inertia} from "@inertiajs/inertia";

    export default  {
        methods : {
            submit : function (cat) {
                let param = {};
                if(cat) param = {
                    for : cat
                };
                Inertia.visit(route('admin.client.index',param))
            },
            showMe : function (cat) {
                    let url = window.location.href;
                    let for_cat = url.split("?")[1];
                    if(!cat) return for_cat!=null;
                    return !(for_cat === 'for='+cat);
            }
        },

    }


</script>
