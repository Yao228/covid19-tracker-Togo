<!-- Topbar Start -->
<div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
    <div class="container-fluid">
        <!-- LOGO -->
        <a href="/dashboard" class="navbar-brand mr-0 mr-md-2 logo">
            <span class="logo-lg">
                {{-- <img src="{{ URL::asset('assets/images/logo.png') }}" alt="" height="24" /> --}}
                <span class="d-inline h5 ml-1 text-logo">COVID-19 Togo</span>
            </span>
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo.png') }}" alt="" height="24">
            </span>
        </a>

        <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
            <li class="">
                <button class="button-menu-mobile open-left disable-btn">
                    <i data-feather="menu" class="menu-icon"></i>
                    <i data-feather="x" class="close-icon"></i>
                </button>
            </li>
        </ul>

        <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
           

            <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left"
                title="Notifications">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                    aria-expanded="false">
                    <i data-feather="bell"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title border-bottom">
                        <h5 class="m-0 font-size-16">
                            <span class="float-right">
                               {{--  <a href="" class="text-dark">
                                    <small>Effacer tout</small>
                                </a> --}}
                            </span>Notification
                        </h5>
                    </div>

                    <div class="p-2">

                        <!-- item-->
                        <p class="">
                            Pour une meilleure prise en charge des cas COVID-19, nous avons mis en place cette application pour accompagner les professionnels de santé et les chercheurs. Pour toute information, contacter : Center for Methodology and Modeling - N°1218/MATDCL <br> Email : c2m@skml.fr
                        </p>
                    </div>

                    <!-- All-->
                    {{-- <a href="javascript:void(0);"
                        class="dropdown-item text-center text-primary notify-item notify-all border-top">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a> --}}

                </div>
            </li>
        </ul>
    </div>
</div>
<!-- end Topbar -->