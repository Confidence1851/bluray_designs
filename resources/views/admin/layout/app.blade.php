<!doctype html>
<html class="no-js" lang="en">
@php($user = Auth::User())
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bluray Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ $admin_source }}/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{ $admin_source }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/themify-icons.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/metisMenu.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="{{ $admin_source }}/css/typography.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/default-css.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/styles.css">
    <link rel="stylesheet" href="{{ $admin_source }}/css/responsive.css">
    <!-- modernizr css -->

    <!-- Start datatable css -->
    <link rel="stylesheet" href="{{ $admin_source }}/datatables/css/app.min.css">
    <link rel="stylesheet" href="{{ $admin_source }}/datatables/datatables.min.css">
    <link rel="stylesheet" href="{{ $admin_source }}/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

    <style>
        .moreinfo{
            padding-left: 5px;
            padding-right: 5px;
        }

        .single-report{
            padding: 10px;
        }

        .delbtn-float{
            position: absolute;
            bottom:0px;
            right:15px;
        }
    </style>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <!-- <div id="preloader">
            <div class="loader"></div>
        </div> -->
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="{{ asset('public/web/img/logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="{{ route('home') }}"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                            </li>

                            <li>
                                <a href="{{ route("admin.brands.index") }}"><i class="ti-user"></i><span>Brands</span></a>
                           </li>
                            
                            <li>
                                 <a href="{{ route('users') }}"><i class="ti-users"></i><span>Users</span></a>
                            </li>

                            <li>
                                 <a href="{{ route('products') }}"><i class="ti-user"></i><span>Products</span></a>
                            </li>

                            <li>
                                 <a href="{{ route('orders') }}"><i class="ti-user"></i><span>Orders</span></a>
                            </li>

                            <li>
                                 <a href="{{ route('allposts') }}"><i class="ti-user"></i><span>Posts</span></a>
                            </li>

                            
                            <!--<li>-->
                            <!--     <a href="#"><i class="ti-envelope"></i><span>Emails</span></a>-->
                            <!--</li>-->

                            <li>
                                 <a href="#" onclick="event.preventDefault();document.getElementById('sessionLogout').submit()"><i class="ti-envelope"></i><span>Logout</span></a>
                                 <form action="{{route('logout')}}" id="sessionLogout" method="post">@csrf</form>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->


    @yield('content')

       
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Profile</a></li>
            <li><a data-toggle="tab" href="#settings">Edit</a></li>

        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                    <div class="user-avatar-name">
                       
                        <h6 class="text-center mt-2" id="username"><b></b></h6>

                    </div>
                <div class="recent-activity">
                    
                    
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <p id="useremail"></p>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <p>Reg Date</p>
                            <p class="time mt-3 "><i class="ti-time"></i> </p>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-arrow"></i>
                        </div>
                        <div class="tm-title">
                             <p><a href="" class="logoutbtn">Logout</a></p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>Edit Profile</h4>
                    <div class="settings-list">
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    
           
                    
                    </div>
@if (Session::has('error_msg'))
    <p id="alert_error" style="display:none">{!! session('error_msg') !!}</p>
@endif
@if (Session::has('success_msg'))
    <p id="alert_success" style="display:none">{!! session('success_msg') !!}</p>
@endif
@if (Session::has('notify_msg'))
    <p id="notify_msg" style="display:none">{!! session('notify_msg') !!}</p>
@endif

<!-- The actual snackbar -->
<div id="snackbar"></div>
<!-- footer area start-->
<footer>
    <div class="footer-area">
        <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
    </div>
</footer>
<!-- footer area end-->
</div>
<!-- page container area end -->
<!-- offset area start -->

    <!-- jquery latest version -->
    <script src="{{ $admin_source }}/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- <script src="{{ $admin_source }}/js/jquery-3.3.1.js"></script> -->
    <!-- bootstrap 4 js -->
    <script src="{{ $admin_source }}/js/popper.min.js"></script>
    <script src="{{ $admin_source }}/js/bootstrap.min.js"></script>
    <script src="{{ $admin_source }}/js/owl.carousel.min.js"></script>
    <script src="{{ $admin_source }}/js/metisMenu.min.js"></script>
    <script src="{{ $admin_source }}/js/jquery.slimscroll.min.js"></script>
    <script src="{{ $admin_source }}/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="{{ $admin_source }}/js/plugins.js"></script>
    <script src="{{ $admin_source }}/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="{{ $admin_source }}/js/scripts.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>

     <!-- Start datatable js -->
  <script src="{{ $admin_source }}/datatables/datatables.min.js"></script>
  <script src="{{ $admin_source }}/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ $admin_source }}/jquery-ui/jquery-ui.min.js"></script>
  <script src="{{ $admin_source }}/datatables/js/page/datatables.js"></script>

</body>

</html>
