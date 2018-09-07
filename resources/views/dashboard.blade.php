@if(Session::has('admin'))
{{-- {{Session::get('admin')}} --}}
<!DOCTYPE html>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>AntJump | Dashboard</title>
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="./assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="./assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="./assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />

    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="./assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="./assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="./assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico" /> </head>

    <link href="./source/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{route('product')}}">
                        <img src="./assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
                        {{-- <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div> --}}
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                    <span class="badge badge-default"> 7 </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">12 pending</span> notifications</h3>
                                            <a href="page_user_profile_1.html">view all</a>
                                        </li>
                                        <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">just now</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-success">
                                                                <i class="fa fa-plus"></i>
                                                            </span> 
                                                            <span>New user registered. </span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">3 mins</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> 
                                                            <span>Server #12 overloaded. </span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">10 mins</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-warning">
                                                                <i class="fa fa-bell-o"></i>
                                                            </span> 
                                                            <span>Server #2 not responding. </span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">14 hrs</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-info">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </span> 
                                                            <span>Application error. </span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">2 days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> 
                                                            <span>Database overloaded 68%. </span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">3 days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger">
                                                                <i class="fa fa-bolt"></i>
                                                            </span>
                                                            <span>A user IP blocked. </span>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">4 days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-warning">
                                                                <i class="fa fa-bell-o"></i>
                                                            </span>
                                                        </span> 
                                                        <span>Storage Server #4 not responding dfdfdfd. </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">5 days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-info">
                                                                <i class="fa fa-bullhorn"></i>
                                                            </span> System Error. 
                                                        </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">9 days</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> Storage server failed. 
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <!-- END NOTIFICATION DROPDOWN -->
                                <!-- BEGIN INBOX DROPDOWN -->
                                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="icon-envelope-open"></i>
                                        <span class="badge badge-default"> 4 </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="external">
                                            <h3>You have <span class="bold">7 New</span> Messages</h3>
                                            <a href="app_inbox.html">view all</a>
                                        </li>
                                        <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                                <li>
                                                    <a href="#">
                                                        <span class="photo">
                                                            <img src="./assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> 
                                                        </span>
                                                        <span class="subject">
                                                            <span class="from"> Lisa Wong </span>
                                                            <span class="time">Just Now </span>
                                                        </span>
                                                        <span class="message">  Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh...  </span>
                                                        
                                                        
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="photo">
                                                            <img src="./assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> 
                                                        </span>
                                                        <span class="subject">
                                                            <span class="from"> Richard Doe </span>
                                                            <span class="time">16 mins </span>
                                                        </span>
                                                        <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="photo">
                                                            <img src="./assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> 
                                                        </span>
                                                        <span class="subject">
                                                            <span class="from"> Bob Nilson </span>
                                                            <span class="time">2 hrs </span>
                                                        </span>
                                                        <span class="message">  Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="photo">
                                                            <img src="./assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> 
                                                        </span>
                                                        <span class="subject">
                                                            <span class="from"> Lisa Wong </span>
                                                            <span class="time">40 mins </span>
                                                        </span>
                                                        <span class="message"> Vivamus sed auctor 40% nibh congue nibh...</span>
                                                        
                                                        
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <span class="photo">
                                                            <img src="./assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> 
                                                        </span>
                                                        <span class="subject">
                                                            <span class="from"> Richard Doe </span>
                                                            <span class="time">46 mins </span>
                                                        </span>
                                                        <span class="message">  Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                                        
                                                        
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <!-- END INBOX DROPDOWN -->
                                <!-- BEGIN TODO DROPDOWN -->
                                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="icon-calendar"></i>
                                        <span class="badge badge-default"> 3 </span>
                                    </a>
                                    <ul class="dropdown-menu extended tasks">
                                        <li class="external">
                                            <h3>You have
                                                <span class="bold">12 pending</span> tasks</h3>
                                                <a href="app_todo.html">view all</a>
                                            </li>
                                            <li>
                                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="task">
                                                                <span class="desc">New release v1.2 </span>
                                                                <span class="percent">30%</span>
                                                            </span>
                                                            <span class="progress">
                                                                <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                                    <span class="sr-only">40% Complete</span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="task">
                                                                <span class="desc">Application deployment</span>
                                                                <span class="percent">65%</span>
                                                            </span>
                                                            <span class="progress">
                                                                <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                                    <span class="sr-only">65% Complete</span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="task">
                                                                <span class="desc">Mobile app release</span>
                                                                <span class="percent">98%</span>
                                                            </span>
                                                            <span class="progress">
                                                                <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                                    <span class="sr-only">98% Complete</span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="task">
                                                                <span class="desc">Database migration</span>
                                                                <span class="percent">10%</span>
                                                            </span>
                                                            <span class="progress">
                                                                <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                                    <span class="sr-only">10% Complete</span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="task">
                                                                <span class="desc">Web server upgrade</span>
                                                                <span class="percent">58%</span>
                                                            </span>
                                                            <span class="progress">
                                                                <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                                    <span class="sr-only">58% Complete</span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="task">
                                                                <span class="desc">Mobile development</span>
                                                                <span class="percent">85%</span>
                                                            </span>
                                                            <span class="progress">
                                                                <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                                    <span class="sr-only">85% Complete</span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <span class="task">
                                                                <span class="desc">New UI release</span>
                                                                <span class="percent">38%</span>
                                                            </span>
                                                            <span class="progress progress-striped">
                                                                <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                                    <span class="sr-only">38% Complete</span>
                                                                </span>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- END TODO DROPDOWN -->
                                    <!-- BEGIN USER LOGIN DROPDOWN -->
                                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                    <li class="dropdown dropdown-user">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                            <img alt="" class="img-circle" src="./assets/layouts/layout/img/avatar3_small.jpg" />
                                            <span class="username username-hide-on-mobile"> Nick </span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-default">
                                            <li>
                                                <a href="page_user_profile_1.html">
                                                    <i class="icon-user"></i> My Profile
                                                </a>
                                            </li>
                                            <li>
                                                <a href="app_calendar.html">
                                                    <i class="icon-calendar"></i> My Calendar 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="app_inbox.html">
                                                    <i class="icon-envelope-open"></i> My Inbox
                                                    <span class="badge badge-danger"> 3 </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="app_todo.html">
                                                    <i class="icon-rocket"></i> My Tasks
                                                    <span class="badge badge-success"> 7 </span>
                                                </a>
                                            </li>
                                            <li class="divider"> </li>
                                            <li>
                                                <a href="page_user_lock_1.html">
                                                    <i class="icon-lock"></i> Lock Screen 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('logoutAdmin')}}">
                                                    <i class="icon-key"></i> Log Out </a>
                                                </li>
                                                <!-- END USER LOGIN DROPDOWN -->
                                                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                                                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                                <li class="dropdown dropdown-quick-sidebar-toggler">
                                                    <a href="javascript:;" class="dropdown-toggle">
                                                        <i class="icon-logout"></i>
                                                    </a>
                                                </li>
                                                <!-- END QUICK SIDEBAR TOGGLER -->
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END TOP NAVIGATION MENU -->

                            </div>
                            <!-- END HEADER INNER -->
                        </div>
                        <!-- END HEADER -->
                        <!-- BEGIN HEADER & CONTENT DIVIDER -->


                        <div class="clearfix"> </div>


                        <!-- BEGIN CONTAINER -->
                        <div class='content'>
                            <div class="page-container">
                                <!-- BEGIN SIDEBAR -->
                                <div class="page-sidebar-wrapper">
                                    <!-- BEGIN SIDEBAR -->
                                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                                    <div class="page-sidebar navbar-collapse collapse">
                                        <!-- BEGIN SIDEBAR MENU -->
                                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                                            <li class="sidebar-toggler-wrapper hide">
                                                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                                                <div class="sidebar-toggler">
                                                    <span></span>
                                                </div>
                                                <!-- END SIDEBAR TOGGLER BUTTON -->
                                            </li>
                                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                                            <li class="sidebar-search-wrapper">
                                                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                                                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                                                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                                                <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                                                    <a href="{{redirect("load-dashboard")}}" class="remove">
                                                        <i class="icon-close"></i>
                                                    </a>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                        <span class="input-group-btn">
                                                            <a href="javascript:;" class="btn submit">
                                                                <i class="icon-magnifier"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </form>
                                                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                                            </li>
                                            <li class="nav-item start ">
                                                <a href="{{route('product')}}" class="nav-link nav-toggle">
                                                    <i class="icon-home"></i>
                                                    <span class="title">Product</span>
                                                </a>
                                                <!-- sub menu -->
                                                <ul class="sub-menu">
                                                    <li class="nav-item start active open">
                                                        <a href="{{route('shirt-esty')}}" class="nav-link ">
                                                            <i class="icon-bar-chart"></i>
                                                            <span class="title">Shrits</span>
                                                            <span class="selected"></span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item start active open">
                                                        <a href="{{route('mug-esty')}}" class="nav-link ">
                                                            <i class="icon-bar-chart"></i>
                                                            <span class="title">Mugs</span>
                                                            <span class="selected"></span>
                                                        </a>
                                                    </li>
                                                     <li class="nav-item start active open">
                                                        <a href="{{route('tshirtat')}}" class="nav-link ">
                                                            <i class="icon-bar-chart"></i>
                                                            <span class="title">Tshirtat</span>
                                                            <span class="selected"></span>
                                                        </a>
                                                    </li>
                                                    <!-- end sub menu -->
                                                </ul>
                                            </li>

                                            <li class="nav-item">
                                                <a href="{{route('event')}}" class="nav-link">
                                                    <i class="icon-home"></i>
                                                    <span class="title">Event</span>
                                                </a>
                                                <!-- sub menu -->
                                                <!-- end sub menu -->
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('trademark')}}" class="nav-link">
                                                    <i class="icon-home"></i>
                                                    <span class="title">Trade Mark</span>
                                                </a>
                                                <!-- sub menu -->
                                                <!-- end sub menu -->
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('statistics')}}" class="nav-link">
                                                    <i class="icon-home"></i>
                                                    <span class="title">Statistics</span>
                                                </a>
                                                <!-- sub menu -->
                                                <!-- end sub menu -->
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('keywords')}}" class="nav-link">
                                                    <i class="icon-home"></i>
                                                    <span class="title">Keywords</span>
                                                </a>
                                                <!-- sub menu -->
                                                <!-- end sub menu -->
                                            </li>
                                        </ul>
                                        <!-- END SIDEBAR MENU -->
                                        <!-- END SIDEBAR MENU -->
                                    </div>
                                    <!-- END SIDEBAR -->
                                </div>
                                @yield('content')
                            </div>
                            <div class="page-footer">
                                <div class="page-footer-inner">
                                    <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank"></a>
                                </div>
                                <div class="scroll-to-top">
                                    <i class="icon-arrow-up"></i>
                                </div>
                            </div>
                        </div>
                        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="./assets/global/plugins/respond.min.js"></script>
<script src="./assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="./assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="./assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
<script src="./assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="./assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/flot/jquery.flot.pie.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/flot/jquery.flot.stack.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/flot/jquery.flot.crosshair.min.js" type="text/javascript"></script>
<script src="./assets/global/plugins/flot/jquery.flot.axislabels.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="./assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="./assets/pages/scripts/ecommerce-dashboard.js" type="text/javascript"></script>
<script src="./assets/pages/scripts/dashboard.js" type="text/javascript"></script>
<script src="./assets/pages/scripts/charts-flotcharts.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="./assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<script src="./assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="./assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="./assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
{{-- Custom js --}}
<script src="./source/js/custom.js" type="text/javascript"></script>
</body>

</html>
@else
<script type="text/javascript">
   window.location.href= "admin";//here double curly bracket
</script>
@endif