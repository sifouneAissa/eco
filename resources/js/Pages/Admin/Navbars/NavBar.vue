<script >

    import {Inertia} from "@inertiajs/inertia";
    import {Link} from "@inertiajs/inertia-vue3";

    import Notifications from "@/Pages/Admin/Navbars/Notifications.vue";
    export  default {
        components : {
            Notifications,
            Link
        },
        methods : {
            logout : function () {
                Inertia.post(
                    route("admin.logout"),
                    {},
                    {
                        // onSuccess: () => Inertia.visit(route('admin.login')),
                    }
                );
            }
        }
    }

</script>
<template>
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-white shadow-sm">
        <Link   class="navbar-brand" :href="route('admin.index')"><img alt="logo"  style="width: 40%; height: 3vw" :src="$page.props.logo"></Link>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
<!--            <div class="input-group">-->
<!--                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />-->
<!--                <div class="input-group-append">-->
<!--                    <button class="btn btn-primary btn-sm" type="button"><i class="feather-search"></i></button>-->
<!--                </div>-->
<!--            </div>-->
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
<!--            <li class="nav-item dropdown no-arrow d-sm-none">-->
<!--                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                    <i class="feather-search mr-2"></i>-->
<!--                </a>-->
<!--                &lt;!&ndash; Dropdown - Messages &ndash;&gt;-->
<!--                <div class="dropdown-menu dropdown-menu-right p-3 shadow-sm animated&#45;&#45;grow-in" aria-labelledby="searchDropdown">-->
<!--                    <form class="form-inline mr-auto w-100 navbar-search">-->
<!--                        <div class="input-group">-->
<!--                            <input type="text" class="form-control border-0 shadow-none" placeholder="Search people, jobs and more..." aria-label="Search" aria-describedby="basic-addon2">-->
<!--                            <div class="input-group-append">-->
<!--                                <button class="btn" type="button">-->
<!--                                    <i class="feather-search"></i>-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="nav-item dropdown no-arrow mx-1 osahan-list-dropdown">-->
<!--                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                    <i class="feather-message-square"></i>-->
<!--                    &lt;!&ndash; Counter - Alerts &ndash;&gt;-->
<!--                    <span class="badge badge-danger badge-counter">8</span>-->
<!--                </a>-->
<!--                &lt;!&ndash; Dropdown - Alerts &ndash;&gt;-->
<!--                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow-sm">-->
<!--                    <h6 class="dropdown-header">-->
<!--                        Message Center-->
<!--                    </h6>-->
<!--                    <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                        <div class="dropdown-list-image mr-3">-->
<!--                            <img class="rounded-circle" src="img/user/2.png" alt="">-->
<!--                            <div class="status-indicator bg-success"></div>-->
<!--                        </div>-->
<!--                        <div class="font-weight-bold overflow-hidden">-->
<!--                            <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>-->
<!--                            <div class="small text-gray-500">Emily Fowler · 58m</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                        <div class="dropdown-list-image mr-3">-->
<!--                            <img class="rounded-circle" src="img/user/3.png" alt="">-->
<!--                            <div class="status-indicator"></div>-->
<!--                        </div>-->
<!--                        <div class="overflow-hidden">-->
<!--                            <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>-->
<!--                            <div class="small text-gray-500">Jae Chun · 1d</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                        <div class="dropdown-list-image mr-3">-->
<!--                            <img class="rounded-circle" src="img/user/4.png" alt="">-->
<!--                            <div class="status-indicator bg-warning"></div>-->
<!--                        </div>-->
<!--                        <div class="overflow-hidden">-->
<!--                            <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>-->
<!--                            <div class="small text-gray-500">Morgan Alvarez · 2d</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a class="dropdown-item d-flex align-items-center" href="#">-->
<!--                        <div class="dropdown-list-image mr-3">-->
<!--                            <img class="rounded-circle" src="img/user/5.png" alt="">-->
<!--                            <div class="status-indicator bg-success"></div>-->
<!--                        </div>-->
<!--                        <div class="overflow-hidden">-->
<!--                            <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>-->
<!--                            <div class="small text-gray-500">Chicken the Dog · 2w</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>-->
<!--                </div>-->
<!--            </li>-->
           <notifications/>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow ml-1 osahan-profile-dropdown">
                <a class="nav-link dropdown-toggle pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="img-profile rounded-circle" :src="$page.props.user.profile_photo_url">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow-sm">
                    <div class="p-3 d-flex align-items-center">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" :src="$page.props.user.profile_photo_url" alt="">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">{{$page.props.auth.name}}</div>
                            <div class="small text-gray-500">
                                <h6><span v-for="role in $page.props.auth.roles" :key="role" class="badge badge-success">{{role}}</span></h6>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" :href="route('profile.show')"><i class="feather-edit"></i> My Account</a>
<!--                    <a class="dropdown-item" href="my-profile.html"><i class="feather-settings"></i> Account Settings</a>-->
                    <div class="dropdown-divider"></div>
                    <form @submit.prevent="logout">
                        <button class="dropdown-item" type="submit" ><i class="feather-log-out"></i> Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
</template>
