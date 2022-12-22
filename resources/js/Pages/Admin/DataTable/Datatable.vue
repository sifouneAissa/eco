<script >
    import EditModal from '@/Pages/Admin/DataTable/Modals/Update.vue';


    export  default {
        props : [
            'datatableHeaders',
            'datatableColumns',
            'datatableUrl',
            'title'
        ],
        components : {
            EditModal
        },
        data () {
            return {
                modelToUpdate : null
            }
        },
        watch : {
            // modelToUpdate : {
            //       handler(val){
            //       console.log("check");
            //       },
            //       deep: true
            //   },
        },
        mounted() {


            let  app = this;

            let datatable = $("#dataTable").dataTable({
                dom: 'Bfrtip',
                responsive: true,
                buttons: {
                    dom: {

                        button: {
                            className: 'btn btn-rounded m-2'
                        }
                    },

                    buttons: [
                        {
                            // copy
                            extend: 'csv',
                            text: '<i class="fas fa-file-csv"></i> CSV',
                            className: 'btn-success ',
                        },
                        {
                            // copy
                            extend: 'excel',
                            text: '<i class="fas fa-file-excel"></i> Excel',
                            className: 'btn-success '
                        },
                        {
                            // copy
                            extend: 'pdf',
                            text: '<i class="fas fa-file-pdf"></i> PDF',
                            className: 'btn-danger '
                        },
                        {
                            // copy
                            extend: 'print',
                            text: '<i class="fas fa-print"></i> Print',
                            className: 'btn-light '
                        },
                        {
                            // copy
                            extend: 'copy',
                            text: '<i class="fas fa-copy"></i> Copy',
                            className: 'btn-primary '
                        },
                        {
                            extend: 'colvis',
                            className: 'btn btn-secondary dropdown-toggle'
                        },
                    ]
                },

                ajax: {
                    url: this.datatableUrl,
                },
                columns : this.datatableColumns,
                processing: true,
                serverSide : true,
                paging : true,
                pageLength  :   12
            })

            $(document).on('click','#btn-edit',function (){
                this.modelToUpdate = $(this).data('id');
                app.$emit('ShowEditModel',this.modelToUpdate);
            })


            $(document).on('click','#btn-show',function (){
                let model = $(this).data('id');
                console.log(model)
            })

            $(document).on('click','#btn-delete',function (){
                let model = $(this).data('id');
                console.log(model)
            })
        }
    }

</script>
<template>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            {{title}}
        </div>
        <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr><th v-for="(h,index) in datatableHeaders" :key="index">{{ h}}</th></tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
        </div>
    </div>

</template>

