<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-navbar-theme container-p-x" id="layout-navbar">

    @empty($hide_layout_sidenav_toggle)
    <!-- Sidenav toggle (see resources/assets/css/demo.css) -->
    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center">
        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:void(0)">
            <i class="ion ion-md-menu text-large align-middle"></i>
        </a>
    </div>
    @endempty

    <!-- Brand -->
    <span class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
        <span class="app-brand-logo demo bg-white rounded-0">
            @include('layouts.includes.logo')
        </span>
        <span class="app-brand-text demo font-weight-normal ml-2">CPC1 Hà Nội</span>
    </span>

    <!-- Navbar toggle -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
        <!-- Divider -->
        <hr class="d-lg-none w-100 my-2">

        <div class="navbar-nav align-items-lg-center ml-auto">

            <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                    <i class="ion ion-md-notifications-outline navbar-icon align-middle"></i>
                    <span class="badge badge-primary badge-dot indicator"></span>
                    <span class="d-lg-none align-middle">&nbsp; Thông báo</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="bg-primary text-center text-white font-weight-bold p-3">
                        Chức năng đang được phát triển
                    </div>

                    <a href="javascript:void(0)" class="d-block text-center text-light small p-2 my-1">Show all notifications</a>
                </div>
            </div>


            <div class="demo-navbar-messages nav-item dropdown mr-lg-3">
                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                    <i class="ion ion-ios-mail navbar-icon align-middle"></i>
                    <span class="badge badge-primary badge-dot indicator"></span>
                    <span class="d-lg-none align-middle">&nbsp; Tin nhắn</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="bg-primary text-center text-white font-weight-bold p-3">
                        Chức năng đang được phát triển
                    </div>

                    <a href="javascript:void(0)" class="d-block text-center text-light small p-2 my-1">Show all messages</a>
                </div>
            </div>

            <!-- Divider -->



        </div>
    </div>

</nav>
