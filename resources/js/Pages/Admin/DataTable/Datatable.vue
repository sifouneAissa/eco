<script>
    import EditModal from '@/Pages/Admin/DataTable/Modals/Update.vue';

    import ClientFilterBtns from '@/Pages/Admin/Clients/FilterBtns.vue';
    import OrderFilterBtns from '@/Pages/Admin/Orders/FilterBtns.vue';

    export default {
        // props: [
        //     'datatableHeaders',
        //     'datatableColumns',
        //     'datatableUrl',
        //     'title',
        //     'without',
        //     'Btns'
        // ],
        props: {
            datatableHeaders: {
                type: [Array],
                default: [],
            },
            datatableColumns: {
                type: [Array],
                default: [],
            },
            datatableUrl: {
                type: [String],
                default: '#',
            },
            title: {
                type: [String],
                default: 'Table',
            },
            without: {
                type: [Array],
                default: [],
            },
            Btns: {
                type: [String],
                default: null,
            },
        },
        components: {
            EditModal,
            ClientFilterBtns,
            OrderFilterBtns
        },
        data() {
            return {
                modelToUpdate: null,

            }
        },
        watch: {
            // modelToUpdate : {
            //       handler(val){
            //       console.log("check");
            //       },
            //       deep: true
            //   },
        },
        mounted() {

            console.log(this.Btns);

            let app = this;

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
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            // copy
                            extend: 'excel',
                            text: '<i class="fas fa-file-excel"></i> Excel',
                            className: 'btn-success ',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            // copy
                            extend: 'pdf',
                            text: '<i class="fas fa-file-pdf"></i> PDF',
                            className: 'btn-danger ',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            // copy
                            extend: 'print',
                            text: '<i class="fas fa-print"></i> Print',
                            className: 'btn-light ',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            // copy
                            extend: 'copy',
                            text: '<i class="fas fa-copy"></i> Copy',
                            className: 'btn-primary ',
                            exportOptions: {
                                columns: ':visible'
                            }
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
                columns: this.datatableColumns,
                processing: true,
                serverSide: true,
                paging: true,
                pageLength: 12
            })

            $(document).on('click', '#btn-edit', function () {
                this.modelToUpdate = $(this).data('id');
                if (this.modelToUpdate.ShowEditModal)
                    app.$emit('ShowEditModel', this.modelToUpdate);
                else
                    app.$emit('ShowEditPage', this.modelToUpdate);

            })


            $(document).on('click', '#btn-show', function () {
                let model = $(this).data('id');
                if (model.ShowShowModal)
                    app.$emit('ShowShowModel', model);
                else app.$emit('ShowShowPage', model);
            })

            $(document).on('click', '#btn-delete', function () {
                let model = $(this).data('id');
                if (model.ShowDeleteModal)
                    app.$emit('ShowDeleteModel', model);
                else app.$emit('ShowDeletePage', model);
            })

            $(document).on('click', '#btn-media', function () {
                let model = $(this).data('id');
                app.$emit('ShowImagePage', model);
            })

            $(document).on('click', '#btn-orders', function () {
                let model = $(this).data('id');
                app.$emit('ShowOrdersPage', model);
            })
        }
    }

</script>
<template>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            {{title}}
            <div v-if="$page.component!=='Dashboard' && (!without || !without.some(item => item === 'add'))" class="float-right">

                <ClientFilterBtns v-if="Btns==='ClientFilterBtns'"/>
                <OrderFilterBtns v-if="Btns==='OrderFilterBtns'"/>
                <button @click="(!$page.props.model || !$page.props.model.is_page) ? $emit('ShowAddModel',$page.props.model) : $emit('ShowAddPage',$page.props.model) " class="btn btn-primary"><h6><i class="feather-plus"></i>Add
                </h6></button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th v-for="(h,index) in datatableHeaders" :key="index">{{ h}}</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

</template>

