<script>
    import EditModal from '@/Pages/Admin/DataTable/Modals/Update.vue';

    import ClientFilterBtns from '@/Pages/Admin/Clients/FilterBtns.vue';
    import OrderFilterBtns from '@/Pages/Admin/Orders/FilterBtns.vue';
    import Delete from '@/Pages/Admin/DataTable/Modals/Delete.vue'
    import {Inertia} from "@inertiajs/inertia";

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
            deleteMUrl: {
              type : [String]
            },
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
            Delete,
            EditModal,
            ClientFilterBtns,
            OrderFilterBtns
        },
        data() {
            return {
                table: null,
                modelToUpdate: null,
                sRows: []
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
            console.log(this.deleteMUrl);
            let app = this;
            this.table = $("#dataTable").dataTable({
                // dom: 'Bfrtip',
                dom: 'B<"clear">lfrtip',

                // responsive: true,
                // rowReorder: {
                //     selector: 'td:nth-child(2)'
                // },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }],
                select: {
                    style: 'multi',
                    selector: 'td:first-child'
                },
                // order: [[ 1, 'asc' ]],
                scrollX: true,
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
                        // {
                        //     text: 'Actions',
                        //     className: 'btn btn-secondary dropdown-toggle',
                        //     action: function () {
                        //         // console.log(app.table.fnGetData().filter(item => item.selected === true));
                        //         app.sRows = [];
                        //         app.table.api().rows({
                        //             selected : true
                        //         }).data().map((item) => app.sRows.push(item));
                        //     }
                        // },
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

            $('#dataTable tbody').on('click', 'tr', function () {

                setTimeout(function() {
                    app.sRows = [];
                    app.table.api().rows({
                        selected : true
                    }).data().map((item) => {
                        app.sRows.push(item)
                    });

                }, 20);

            });


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
        },
        methods : {

            submitD : function () {
                let app = this;
                // this.form
                Inertia.post(route(this.$page.props.deleteMUrl),{
                        ids : this.sRows.map((item) => item.id)
                    },{
                    onFinish: () => {
                    },
                    onSuccess : () => {
                        $('#delete-multi').modal('hide');
                        $('#dataTable').DataTable().ajax.reload();
                        app.sRows = [];
                    }
                });
            }
        }
    }

</script>
<template>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            {{title}}
            <div v-if="$page.component!=='Dashboard' && (!without || !without.some(item => item === 'add'))"
                 class="float-right">

                <button v-if="this.sRows.length!==0" class="btn btn btn-rounded m-2 btn-primary" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h6>
                    <i class="feather-chevron-down"></i>Actions</h6></button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button v-if="this.$page.props.deleteMUrl" class="dropdown-item text-danger"  data-toggle="modal" data-target="#delete-multi">Delete <i class="feather-trash-2"></i></button>
                </div>
                <ClientFilterBtns v-if="Btns==='ClientFilterBtns'"/>
                <OrderFilterBtns v-if="Btns==='OrderFilterBtns'"/>
                <button
                    @click="(!$page.props.model || !$page.props.model.is_page) ? $emit('ShowAddModel',$page.props.model) : $emit('ShowAddPage',$page.props.model) "
                    class="btn btn btn-rounded m-2 btn-primary"><h6><i class="feather-plus"></i>Add
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
        <Delete :id="'delete-multi'" title="Delete multiple items">
            <div  class="modal-body mx-3 bg" >
                <form @submit.prevent="submitD" >
                    <div class="modal-body">
                        <h4>Are you sure ?</h4>
                    </div>

                    <div class="modal-footer d-flex  ">
                        <button type="button" class="btn btn-outline-danger"  data-dismiss="modal">{{$t("account.addresses.add_card.cancel")}}
                        </button><button  type="submit" class="btn btn-danger">{{$t("account.addresses.add_card.save")}}</button>
                    </div>
                </form>

            </div>
        </Delete>
    </div>

</template>
<style scoped>
    div.dataTables_wrapper {
        width: 800px;
        margin: 0 auto;
    }
</style>
