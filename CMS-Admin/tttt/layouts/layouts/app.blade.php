<!DOCTYPE html>
<html class=" ">
<head>
<!-- 
         * @Package: Complete Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 2.2
         * This file is part of Complete Admin Theme.
        -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>Complete Admin : Form Wizard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" href="{{ URL::asset('public/theme/assets/images/favicon.png') }}" type="image/x-icon" />
<!-- Favicon -->
<link rel="apple-touch-icon-precomposed" href="{{ URL::asset('public/theme/assets/images/apple-touch-icon-57-precomposed.png') }}">
<!-- For iPhone -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('public/theme/assets/images/apple-touch-icon-114-precomposed.png') }}">
<!-- For iPhone 4 Retina display -->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('public/theme/assets/images/apple-touch-icon-72-precomposed.png') }}">
<!-- For iPad -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('public/theme/assets/images/apple-touch-icon-144-precomposed.png') }}">
<!-- For iPad Retina display -->

<!-- CORE CSS FRAMEWORK - START -->
<link href="{{ URL::asset('public/theme/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{ URL::asset('public/theme/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('public/theme/assets/plugins/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('public/theme/assets/fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('public/theme/assets/css/animate.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('public/theme/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css"/>
<!-- CORE CSS FRAMEWORK - END -->

<!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START -->
        
<link href="{{ URL::asset('public/theme/assets/plugins/jquery-ui/smoothness/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{ URL::asset('public/theme/assets/plugins/datepicker/css/datepicker.css') }}" rel="stylesheet" type="text/css" media="screen"/>

<link href="{{ URL::asset('public/theme/assets/plugins/datatables/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{ URL::asset('public/theme/assets/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{ URL::asset('public/theme/assets/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<link href="{{ URL::asset('public/theme/assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" media="screen"/>
<!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END -->

<!-- CORE CSS TEMPLATE - START -->
<link href="{{ URL::asset('public/theme/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ URL::asset('public/theme/assets/css/responsive.css') }}" rel="stylesheet" type="text/css"/>
<!-- CORE CSS TEMPLATE - END -->

<style>
.check {
	opacity:0.5;
	color:#996;
}
.HideBox .content-body, .HideBox2 .content-body {
	display:none;
}
</style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class=" ">
<!-- START TOPBAR -->
<div class='page-topbar '>
  <div class='logo-area'> </div>
  <div class='quick-area'>
    <div class='pull-left'>
      <ul class="info-menu left-links list-inline list-unstyled">
        <li class="sidebar-toggle-wrap"> <a href="#" data-toggle="sidebar" class="sidebar_toggle"> <i class="fa fa-bars"></i> </a> </li>
        <li class="message-toggle-wrapper"> <a href="#" data-toggle="dropdown" class="toggle"> <i class="fa fa-envelope"></i> <span class="badge badge-accent">7</span> </a>
          <ul class="dropdown-menu messages animated fadeIn">
            <li class="list">
              <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                <li class="unread status-available"> <a href="javascript:;">
                  <div class="user-img"> <img src="{{ URL::asset('public/theme/data/profile/avatar-1.png') }}" alt="user-image" class="img-circle img-inline"> </div>
                  <div> <span class="name"> <strong>Clarine Vassar</strong> <span class="time small">- 15 mins ago</span> <span class="profile-status available pull-right"></span> </span> <span class="desc small"> Sometimes it takes a lifetime to win a battle. </span> </div>
                  </a> </li>
                
                
                
                <li class=" status-away"> <a href="javascript:;">
                  <div class="user-img"> <img src="{{ URL::asset('public/theme/data/profile/avatar-1.png') }}" alt="user-image" class="img-circle img-inline"> </div>
                  <div> <span class="name"> <strong>Araceli Boatright</strong> <span class="time small">- 16th Mar</span> <span class="profile-status away pull-right"></span> </span> <span class="desc small"> Sometimes it takes a lifetime to win a battle. </span> </div>
                  </a> </li>
              </ul>
            </li>
            <li class="external"> <a href="javascript:;"> <span>Read All Messages</span> </a> </li>
          </ul>
        </li>
        <li class="notify-toggle-wrapper"> <a href="#" data-toggle="dropdown" class="toggle"> <i class="fa fa-bell"></i> <span class="badge badge-accent">3</span> </a>
          <ul class="dropdown-menu notifications animated fadeIn">
            <li class="total"> <span class="small"> You have <strong>3</strong> new notifications. <a href="javascript:;" class="pull-right">Mark all as Read</a> </span> </li>
            <li class="list">
              <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                <li class="unread available"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-check"></i> </div>
                  <div> <span class="name"> <strong>Server needs to reboot</strong> <span class="time small">15 mins ago</span> </span> </div>
                  </a> </li>
                <li class="unread away"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-envelope"></i> </div>
                  <div> <span class="name"> <strong>45 new messages</strong> <span class="time small">45 mins ago</span> </span> </div>
                  </a> </li>
                <li class=" busy"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-times"></i> </div>
                  <div> <span class="name"> <strong>Server IP Blocked</strong> <span class="time small">1 hour ago</span> </span> </div>
                  </a> </li>
                <li class=" offline"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-user"></i> </div>
                  <div> <span class="name"> <strong>10 Orders Shipped</strong> <span class="time small">5 hours ago</span> </span> </div>
                  </a> </li>
                <li class=" offline"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-user"></i> </div>
                  <div> <span class="name"> <strong>New Comment on blog</strong> <span class="time small">Yesterday</span> </span> </div>
                  </a> </li>
                <li class=" available"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-check"></i> </div>
                  <div> <span class="name"> <strong>Great Speed Notify</strong> <span class="time small">14th Mar</span> </span> </div>
                  </a> </li>
                <li class=" busy"> <!-- available: success, warning, info, error --> 
                  <a href="javascript:;">
                  <div class="notice-icon"> <i class="fa fa-times"></i> </div>
                  <div> <span class="name"> <strong>Team Meeting at 6PM</strong> <span class="time small">16th Mar</span> </span> </div>
                  </a> </li>
              </ul>
            </li>
            <li class="external"> <a href="javascript:;"> <span>Read All Notifications</span> </a> </li>
          </ul>
        </li>
        <li class="hidden-sm hidden-xs searchform">
          <form action="{{ url('/') }}" method="post">
            <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-search"></i> </span>
              <input type="text" class="form-control animated fadeIn" placeholder="Search & Enter">
            </div>
            <input type='submit' value="">
          </form>
        </li>
      </ul>
    </div>
    <div class='pull-right'>
      <ul class="info-menu right-links list-inline list-unstyled">
        <li class="profile"> <a href="#" data-toggle="dropdown" class="toggle"> <img src="{{ URL::asset('public/theme/data/profile/profile.jpg') }}" alt="user-image" class="img-circle img-inline"> <span>Shane Taylor <i class="fa fa-angle-down"></i></span> </a>
          <ul class="dropdown-menu profile animated fadeIn">
            <li> <a href="#settings"> <i class="fa fa-wrench"></i> Settings </a> </li>
            <li> <a href="#profile"> <i class="fa fa-user"></i> Profile </a> </li>
            <li> <a href="#help"> <i class="fa fa-info"></i> Help </a> </li>
            <li class="last"> <a href="{{ url('/logout') }}"> <i class="fa fa-lock"></i> Logout </a> </li>
          </ul>
        </li>
        <li class="chat-toggle-wrapper"> <a href="#" data-toggle="chatbar" class="toggle_chat"> <i class="fa fa-comments"></i> <span class="badge badge-accent">9</span> <i class="fa fa-times"></i> </a> </li>
      </ul>
    </div>
  </div>
</div>
<!-- END TOPBAR -->

<!-- START CONTAINER -->
<div class="page-container row-fluid container-fluid"> 
  
  <!-- SIDEBAR - START -->
  
  <div class="page-sidebar fixedscroll"> 
    
    <!-- MAIN MENU - START -->
    <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
      
      <!-- USER INFO - START -->
      <div class="profile-info row">
        <div class="profile-image col-xs-4"> <a href="{{ url('/') }}"> <img alt="" src="{{ URL::asset('public/theme/data/profile/profile.jpg') }}" class="img-responsive img-circle"> </a> </div>
        <div class="profile-details col-xs-8">
          <h3> <a href="{{ url('/') }}">Shane Taylor</a> 
            
            <!-- Available statuses: online, idle, busy, away and offline --> 
            <span class="profile-status online"></span> </h3>
          <p class="profile-title">Web Developer</p>
        </div>
      </div>
      <!-- USER INFO - END -->
      
      <ul class='wraplist'>
          <li> <a href="{{ url('/home/web') }}"> <i class="fa fa-home"></i> <span class="title">Home</span> </a> </li>
        <li class='menusection'> <i class="fa fa-dashboard"></i> <span class="title">Dashboard</span></li>
        
        <li class='menusection'><i class="fa fa-key fa-lg"></i> <span class="title">Access</span></li>
        
 
        
                   <li> <a href="{{ url('/permissions/create') }}"> <i class="fa fa-institution"></i> <span class="title">Roles</span>  </a>
                   
                  </li>
                     <li><a href="{{ url('/users') }}"><i class="fa fa-user"></i> <span class="title">Users </span> </a> </li>
                       <li><a href="{{ url('/orgprofusers') }}"><i class="fa fa-user"></i> <span class="title">Professional Service Users </span> </a> </li>
        <li class='menusection'><i class="fa fa-users fa-lg"></i> <span class="title">Accounts</span></li>
       <li > <a href="javascript:;"><i class="fa fa-institution"></i> <span class="title">Organization</span> <span class="arrow "></span> </a>
          <ul class="sub-menu" >
           <li><a href="{{ url('/org') }}">Organizations List</a></li>
                      <li><a href="{{ url('/org/create') }}">Organization Registration</a></li>
                      <li><a href="{{ url('/orgadmin') }}">Organization Admins</a></li>
          </ul>
        </li>
        <li><a href="{{ url('/services') }}"><i class="fa fa-user"></i> <span class="title">Services </span> </a> </li>
         <li> <a href="{{ url('/orgservice') }}"><i class="fa fa-user"></i> <span class="title">Org Services </span> </a> </li>
            <li class=""> <a href="{{ url('/contracts') }}"> <i class="fa fa-calendar"></i> <span class="title">Contacts</span> </a> </li>
               <li class=""> <a href="{{ url('/orgbills') }}"> <i class="fa fa-money"></i> <span class="title">Billings</span> </a> </li>
         	
        
        <li class='menusection'><i class="fa fa-gear"></i> <span class="title">Settings</span></li>
        
          <li><a href="#"><i class="fa fa-user"></i> <span class="title">General </span> </a> </li>
            <li><a href="#"><i class="fa fa-user"></i> <span class="title"> Alerts</span> </a> </li>
              <li><a href="#"><i class="fa fa-user"></i> <span class="title">Site Preferences </span> </a> </li>
              
      <li class='menusection'><i class="fa fa-gear"></i> <span class="title"> Portal Settings</span></li>
    
       
 
      </ul>
    </div>
    <!-- MAIN MENU - END --> 
    
  </div>
  <!--  SIDEBAR - END --> 
  <!-- START CONTENT -->
  <section id="main-content" class=" ">
  
           @yield('content')
           
  
</section>
<!-- END CONTENT -->

</div>
<!-- END CONTAINER -->

<!-- LOAD FILES AT PAGE END FOR FASTER LOADING --> 

<!-- CORE JS FRAMEWORK - START --> 
<script src="{{ URL::asset('public/theme/assets/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('public/theme/assets/js/jquery.easing.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('public/theme/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('public/theme/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('public/theme/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('public/theme/assets/plugins/viewport/viewportchecker.js') }}" type="text/javascript"></script> 
<script>window.jQuery||document.write('<script src="{{ URL::asset("public/theme/assets/js/jquery-1.11.2.min.js") }}"><\/script>');</script> 
<!-- CORE JS FRAMEWORK - END --> 

<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 

<script src="{{ URL::asset('public/theme/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('public/theme/assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('public/theme/assets/js/form-validation.js') }}" type="text/javascript"></script> 
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 




<script src="{{ URL::asset('public/theme/assets/plugins/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('public/theme/assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('public/theme/assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('public/theme/assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js') }}" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<script src="{{ URL::asset('public/theme/assets/plugins/jquery-ui/smoothness/jquery-ui.min.js') }}" type="text/javascript"></script> <script src="{{ URL::asset('public/theme/assets/plugins/datepicker/js/datepicker.js') }}" type="text/javascript"></script>

<!-- CORE TEMPLATE JS - START --> 
<script src="{{ URL::asset('public/theme/assets/js/scripts.js') }}" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyArv9ALhBv6ihfhABHEAkFg0-JHywhtgjM&sensor=false"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


</body>

</html>





