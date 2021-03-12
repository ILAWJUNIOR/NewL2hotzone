<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>L2HotZone |  @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  
  <link rel="stylesheet" href="{{ url('css/bootstrap3.4.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/_all-skins.min.css') }}">
  <!-- <link rel="stylesheet" href="{{ url('css/blue.css') }}"> -->
  
  <link rel="stylesheet" href="{{ url('css/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ url('css/bootstrap3-wysihtml5.min.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- datatables -->
  <link rel="stylesheet" href="{{ url('css/datatable/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/datatable/Responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="url('css/datatable/Buttons/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="url('css/datatable/Buttons/css/buttons.bootstrap4.min.css')}}">
   
  <!-- End datatables -->
  

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('costa') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>H</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>L2Hot</b>Zone</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
           
           <a href="{{ url('costa/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           {{ trans('lang.logout') }}
                                        </a>
                                         <form id="logout-form" action="{{ url('costa/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
           
            
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
        
          <!-- User Account: style can be found in dropdown.less -->
         <!--  <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ url('img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
             
              <li class="user-header">
                <img src="{{ url('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
           
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li> -->
          <!-- Control Sidebar Toggle Button -->
        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ trans('lang.admin') }}</p>
          <a href="{{ url('costa') }}"><i class="fa fa-circle text-success"></i>{{ trans('lang.online') }}</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">{{ trans('lang.main_navigation') }}</li>
        <li class="active">
          <a href="{{ url('costa') }}">
            <i class="fa fa-dashboard"></i> <span>{{ trans('lang.dashboard') }}</span>
           <!--  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
         <!--  <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> -->
        </li>
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>{{ trans('lang.server') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="{{ url('costa/server/add')}}"><i class="fa fa-circle-o"></i> Add New</a></li> -->
            <li><a href="{{ url('costa/server/list')}}"><i class="fa fa-circle-o"></i> {{ trans('lang.list') }}</a></li>
          
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>{{ trans('lang.advertising') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('costa/banner/list')}}"><i class="fa fa-circle-o"></i>{{ trans('lang.banner_ad') }} {{ trans('lang.advertising') }}</a></li>
            <li><a href="{{url('costa/banner-advertisement/list')}}"><i class="fa fa-circle-o"></i> {{ trans('lang.text_ad') }} {{ trans('lang.advertising') }}</a></li>
            <li><a href="{{url('costa/premium-advertisement/list')}}"><i class="fa fa-circle-o"></i> {{ trans('lang.premium_server') }} {{ trans('lang.advertising') }}</a></li>
            
            <!-- <li><a href=""><i class="fa fa-circle-o"></i> Add</a></li> -->
           
          </ul>
        </li>
        <li><a href="{{url('costa/advertisement-options/list')}}"><i class="fa fa-adn"></i>{{ trans('lang.text_ad') }} {{ trans('lang.advertising') }} {{ trans('lang.options') }}</a></li>
        <li><a href="{{url('costa/stream-advertisement/list')}}"><i class="fa fa-play"></i> {{ trans('lang.stream') }} {{ trans('lang.advertising') }}</a></li>
            <!-- <li><a href=""><i class="fa fa-circle-o"></i> Add</a></li> -->
        <li><a href="{{url('costa/reviews/list')}}"><i class="fa fa-star"></i>{{ trans('lang.review') }}</a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>{{ trans('lang.payment') }} </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('costa/payment/list')}}"><i class="fa fa-circle-o"></i> {{ trans('lang.list') }}</a></li>
            <!-- <li><a href=""><i class="fa fa-circle-o"></i> Add</a></li> -->
           
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>{{ trans('lang.user_management') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('costa/members')}}"><i class="fa fa-circle-o"></i> {{ trans('lang.list') }}</a></li>
            <!-- <li><a href=""><i class="fa fa-circle-o"></i> Add</a></li> -->
           
          </ul>
        </li>
           <li class="treeview">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>{{ trans('lang.logs') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('costa/redirection_server_list')}}"><i class="fa fa-circle-o"></i>{{ trans('lang.redirection_server_log') }}</a></li>
            <!-- <li><a href=""><i class="fa fa-circle-o"></i> Add</a></li> -->
           
          </ul>
        </li>
      <!--   <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li> -->
        
       
       
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 
  
  