<script >
    import AdminLayout from '@/Pages/Admin/Layout/AdminLayout.vue';
    import { Link } from "@inertiajs/inertia-vue3";
    import Datatable from '@/Pages/Admin/DataTable/Datatable.vue';
    import  "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js";
    export default  {
        components : {
            AdminLayout,
            Link,
            Datatable
        },
        props : ['weeksD','monthsD','Ndata','datatableUrl','datatableColumns','datatableHeaders'],
        mounted() {

            let app = this;
            $(document).ready( function () {
                    let max = 0;
                    let min = 0;
                    let labels = app.weeksD.map((item) => {

                        return item.s + ' -> ' + item.e;
                    });
                    let data = app.weeksD.map((item) => {

                        max = max>=item.amount ? max : item.amount;
                        min = min<=item.amount ? min : item.amount;

                        return item.amount;
                    })
                // Set new default font family and font color to mimic Bootstrap's default styling
                // Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                // Chart.defaults.global.defaultFontColor = '#292b2c';
                var ctx = document.getElementById("myAreaChart");
                     let Mmax = 0;
                     let Mmin = 0;
                     let Mlabels = app.monthsD.map((item) => {
                        return item.month;
                    });
                     let Mdata = app.monthsD.map((item) => {
                         Mmax = Mmax>=item.amount ? Mmax : item.amount;
                         Mmin = Mmin<=item.amount ? Mmin : item.amount;
                        return item.amount;
                    });

                var myLineChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        // labels: ["Mar 1", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13"],
                        labels: labels,
                        datasets: [{
                            label: "Weekly Revenue",
                            lineTension: 0.3,
                            backgroundColor: "rgba(2,117,216,0.2)",
                            borderColor: "rgba(2,117,216,1)",
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(2,117,216,1)",
                            pointBorderColor: "rgba(255,255,255,0.8)",
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(2,117,216,1)",
                            pointHitRadius: 50,
                            pointBorderWidth: 2,
                            // data: [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
                            data: data,
                        }],
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                time: {
                                    unit: 'date'
                                },
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    maxTicksLimit: 4
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    min: min,
                                    max: max,
                                    maxTicksLimit: 4
                                },
                                gridLines: {
                                    color: "rgba(0, 0, 0, .125)",
                                }
                            }],
                        },
                        legend: {
                            display: false
                        }
                    }
                });
                    // Bar Chart Example
                    var ctx = document.getElementById("myBarChart");
                    var myLineChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: Mlabels,
                            datasets: [{
                                label: "Monthly Revenue",
                                backgroundColor: "rgba(2,117,216,1)",
                                borderColor: "rgba(2,117,216,1)",
                                data: Mdata,
                            }],
                        },
                        options: {
                            scales: {
                                xAxes: [{
                                    time: {
                                        unit: 'month'
                                    },
                                    gridLines: {
                                        display: false
                                    },
                                    ticks: {
                                        maxTicksLimit: 12
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        min: Mmin,
                                        max: Mmax,
                                        maxTicksLimit: 5
                                    },
                                    gridLines: {
                                        display: true
                                    }
                                }],
                            },
                            legend: {
                                display: false
                            }
                        }
                    });
            })
        }
    }
</script>
<template>

    <AdminLayout :title="'Dashboard'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <!--        page content -->
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">{{Ndata.usersCount}} New Client Today! </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <Link class="small text-white stretched-link" :href="route('admin.client.index')">View Details</Link>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">{{Ndata.ordersCount}} New Orders Today!</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <Link class="small text-white stretched-link" :href="route('admin.order.index')">View Details</Link>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">{{Ndata.amount}} of Incomes !</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="small text-white stretched-link" href="reviews.html">Today</div>
<!--                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>-->
                        </div>
                    </div>
                </div>
<!--                <div class="col-xl-3 col-md-6">-->
<!--                    <div class="card bg-danger text-white mb-4">-->
<!--                        <div class="card-body">10 New Bookmarks!</div>-->
<!--                        <div class="card-footer d-flex align-items-center justify-content-between">-->
<!--                            <a class="small text-white stretched-link" href="bookmarks.html">View Details</a>-->
<!--                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                            Sales earnings this month
                        </div>
                        <div class="card-body" style="height: 400px">
                            <canvas id="myAreaChart" width="100%" ></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar mr-1"></i>
                            All Time Earnings
                        </div>
                        <div class="card-body" style="height: 400px">
                            <canvas id="myBarChart" width="100%" ></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <Datatable  :title="'Recent Orders'" :datatableHeaders="datatableHeaders" :datatableColumns="datatableColumns" :datatableUrl="datatableUrl" />
        </div>
    </AdminLayout>
</template>

