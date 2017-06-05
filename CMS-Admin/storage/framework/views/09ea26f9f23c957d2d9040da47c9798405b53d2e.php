<!DOCTYPE html>
<html class=" ">
<head>
<?php echo $__env->make('layouts.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class=" ">
<!-- START TOPBAR -->
<?php echo $__env->make('layouts.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
<!-- END TOPBAR -->

<!-- START CONTAINER -->
<div class="page-container row-fluid container-fluid"> 
  
  <!-- SIDEBAR - START -->
  
  <div class="page-sidebar fixedscroll"> 
    
    <!-- MAIN MENU - START -->
    <?php echo $__env->make('layouts.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
    <!-- MAIN MENU - END --> 
    
  </div>
  <!--  SIDEBAR - END --> 
  <!-- START CONTENT -->
  <section id="main-content" class=" ">
  
           <?php echo $__env->yieldContent('content'); ?>
           
  
</section>
<!-- END CONTENT -->

</div>
<!-- END CONTAINER -->

<!-- Footer Starts --> 

   <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
   <!-- Footer Endds --> 
</body>

</html>





