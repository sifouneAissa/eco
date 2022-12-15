<script setup>
    import { ref } from 'vue';
    import { Inertia } from '@inertiajs/inertia';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import ApplicationMark from '@/Components/ApplicationMark.vue';
    import Banner from '@/Components/Banner.vue';
    import Dropdown from '@/Components/Dropdown.vue';
    import DropdownLink from '@/Components/DropdownLink.vue';
    import NavLink from '@/Components/NavLink.vue';
    import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

    defineProps({
        title: String,
    });

    const showingNavigationDropdown = ref(false);

    const switchToTeam = (team) => {
        Inertia.put(route('current-team.update'), {
            team_id: team.id,
        }, {
            preserveState: false,
        });
    };

    const logout = () => {
        Inertia.post(route('logout'));
    };
</script>

<template>
    <div>
        <Head :title="title" />

        <div id="wrapper">
            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center" href="index.html">
                    <div class="sidebar-brand-icon">
                        <img src="img/logo.png" class="img-fluid">
                    </div>
                </a>
                <!-- Nav Item - Home -->
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span>Home</span></a>
                </li>
                <!-- Nav Item - Explore -->
                <li class="nav-item">
                    <a class="nav-link" href="explore.html">
                        <i class="mdi mdi-grid-large"></i>
                        <span>Explore</span></a>
                </li>
                <!-- Nav Item - Favourities -->
                <li class="nav-item">
                    <a class="nav-link" href="favourities.html">
                        <i class="mdi mdi-bookmark-outline"></i>
                        <span>Favourities</span></a>
                </li>
                <!-- Nav Item - Orders -->
                <li class="nav-item">
                    <a class="nav-link" href="orders.html">
                        <i class="mdi mdi-book-open"></i>
                        <span>Orders</span></a>
                </li>
                <!-- Nav Item - Messages -->
                <li class="nav-item">
                    <a class="nav-link d-flex" href="messages.html">
                        <i class="mdi mdi-message-text-outline mr-2"></i>
                        <span>Messages</span>
                        <span class="rounded-circle bg-white text-primary ml-auto px-2 py-1">2</span></a>
                </li>
                <!-- Nav Item - Settings -->
                <li class="nav-item">
                    <a class="nav-link" href="settings.html">
                        <i class="mdi mdi-cog"></i>
                        <span>Settings</span></a>
                </li>
                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Extra Pages</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Pages:</h6>
                            <a class="collapse-item" href="detail.html">Details</a>
                            <a class="collapse-item" href="listing.html">Listing</a>
                            <a class="collapse-item" href="messages.html">Messages</a>
                            <a class="collapse-item" href="search.html">Search</a>
                            <a class="collapse-item" href="buttons.html">Components</a>
                            <a class="collapse-item" href="404.html">Page Not Found</a>
                            <h6 class="collapse-header">Account:</h6>
                            <a class="collapse-item" href="signin.html">Signin</a>
                            <a class="collapse-item" href="signup.html">Signup</a>
                            <a class="collapse-item" href="forgot.html">Forgot Password</a>
                        </div>
                    </div>
                </li>
                <!-- offers -->
                <div class="bg-white m-3 p-3 sidebar-alert rounded text-center alert fade show d-none d-md-inline" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <i class="mdi mdi-food mb-3"></i>
                    <p class="text-black mb-1">Free delivery on<br>all orders over <span class="text-primary">$25</span></p>
                    <p class="small">It is a limited time offer that will expire soon.</p>
                    <a href="explore.html" class="btn btn-primary btn-block btn-sm">Order now <i class="pl-3 fas fa-long-arrow-alt-right"></i></a>
                </div>
                <!-- User -->
                <div class="d-none d-md-block">
                    <div class="user d-flex align-items-center p-3">
                        <div class="pr-3"><i class="mdi mdi-account-circle-outline text-white h3 mb-0"></i></div>
                        <div>
                            <p class="mb-0 text-white">Mark Clarke</p>
                            <p class="mb-0 text-white-50 small">example@gmail.com</p>
                        </div>
                    </div>
                </div>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <!-- End of Sidebar -->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm osahan-nav-top">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav">
                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="mdi mdi-magnify"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <!-- Nav Item - location -->
                            <li class="nav-item dropdown no-arrow mx-2 osahan-t-loc">
                                <a class="nav-link dropdown-toggle text-dark" href="#" data-toggle="modal" data-target="#addressModal">
                                    <span class="mdi mdi-crosshairs-gps"></span><span class="ml-2">San Frnciso, california</span>
                                </a>
                            </li>
                            <!-- Nav Item - pickup -->
                            <li class="nav-item dropdown no-arrow mx-2 osahan-t-pu">
                                <a class="nav-link dropdown-toggle text-dark" href="orders.html">
                                    <i class="mdi mdi-shopping text-danger"></i><span class="ml-2">Pick up</span>
                                </a>
                            </li>
                            <!-- Nav Item - deals -->
                            <li class="nav-item dropdown no-arrow mx-2 osahan-t-bd">
                                <a class="nav-link dropdown-toggle text-dark" data-toggle="modal" data-target="#mycoupansModal" href="#">
                                    <i class="mdi mdi-sack-percent text-warning"></i><span class="ml-2">Best Deals</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Topbar Search -->
                        <div class="ml-auto">
                            <a href="search.html">
                                <form class="d-none d-sm-inline-block form-inline mx-2 my-2 my-md-0 mw-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="mdi mdi-magnify"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </a>
                            <a href="#" class="btn btn-primary " data-toggle="modal" data-target="#filtersModal"><i class="mdi mdi-filter-variant"></i></a>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#cartModal"><i class="mdi mdi-shopping-outline"></i></a>
                        </div>
                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->


                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>
    </div>
</template>
