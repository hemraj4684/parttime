<!DOCTYPE html>
<html class=" ">
    <title>CMS Dashboard</title>
<head>
@include('layouts.head') 
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class=" ">
<!-- START TOPBAR -->
@include('layouts.top') 
<!-- END TOPBAR -->

<!-- START CONTAINER -->
<div class="page-container row-fluid container-fluid"> 
  
  <!-- SIDEBAR - START -->
  
  <div class="page-sidebar fixedscroll"> 
    
    <!-- MAIN MENU - START -->
    @include('layouts.menu') 
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

<!-- Footer Starts --> 








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


<script src="{{ URL::asset('public/theme/assets/plugins/jvectormap/jquery-jvectormap-2.0.1.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('public/theme/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<script src="{{ URL::asset('public/theme/assets/js/dashboard.js') }}" type="text/javascript"></script> 
<script src="{{ URL::asset('public/theme/assets/plugins/echarts/echarts-custom-for-dashboard.js') }}" type="text/javascript"></script>

<!-- CORE TEMPLATE JS - START --> 
<script src="{{ URL::asset('public/theme/assets/js/scripts.js') }}" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 



   <!-- Footer Endds --> 
</body>

</html>







