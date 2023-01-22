<template>
    <div class="modal fade" :id="id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header text-center bg-danger">
                    <h4 class="modal-title w-100 font-weight-bold">{{title}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="$emit('resetModel')">&times;</span>
                    </button>
                </div>

                <!-- Page Content -->
                <main>
                    <slot />
                </main>

            </div>
        </div>
    </div>

</template>
<script>

    export default  {
        props : ['id','title']
    }
</script>

