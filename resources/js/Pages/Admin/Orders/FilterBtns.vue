<template>
<!--    <div >-->
        <button v-if="showMe('delivered')" @click="submit('delivered')"  class="mr-1 btn btn btn-rounded m-2 btn-success"><h6><i class="feather-check-circle"></i> Picked up</h6></button>
        <button v-if="showMe('onway')" @click="submit('onway')" class="mr-1 btn btn btn-rounded m-2 btn-dark"><h6><i class="feather-truck"></i> On Way</h6></button>
        <button v-if="showMe('received')" @click="submit('received')" class="mr-1 btn btn btn-rounded m-2 btn-danger"><h6><i class="feather-check"></i> Received</h6></button>
        <button v-if="showMe('waiting')" @click="submit('waiting')" class="mr-1 btn btn btn-rounded m-2 btn-warning"><h6><i class="feather-clock"></i> Waiting</h6></button>
        <button v-if="showMe(null)" @click="submit()" class="mr-1 btn btn btn-rounded m-2 btn-light"><h6><i class="feather-align-center"></i> All</h6></button>
<!--    </div>-->
</template>

<script >
    import {Inertia} from "@inertiajs/inertia";

    export default  {
        methods : {

            submit : function (cat) {
                let param = {};
                let url = window.location.href;

                if(cat) {
                    url = url.split("for")[0];
                    if(url.includes('?'))
                        if(url.includes('&'))
                        url = url + 'for='+cat;
                        else
                        url = url + '&for='+cat;
                    else
                        url = url + '?for='+cat;
                }else
                    if(url.includes("&"))
                    url = url.split("&for")[0];
                    else url = url.split("for")[0];


                Inertia.visit(url)
            },
            showMe : function (cat) {
                    let url = window.location.href;
                    let for_cat = url.split("for")[1];
                    if(!cat) return for_cat!==null;

                    return !for_cat || !for_cat.includes('='+cat);
            }
        },

    }


</script>
<style scoped>
</style>
