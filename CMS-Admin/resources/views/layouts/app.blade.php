<!DOCTYPE html>
<html class=" ">
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

   @include('layouts.footer') 
   <!-- Footer Endds --> 
</body>
@yield('script')
</html>





