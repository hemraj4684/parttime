
<!DOCTYPE html>
<html class="">
    <head>
        <!-- 
         * @Package: Complete Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 2.2
         * This file is part of Complete Admin Theme.
        -->
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>CMS Admin : Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ URL::asset('public/theme/assets/images/favicon.png') }}" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('public/theme/assets/images/apple-touch-icon-57-precomposed.png') }}">	<!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('public/theme/assets/images/apple-touch-icon-114-precomposed.png') }}">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('public/theme/assets/images/apple-touch-icon-72-precomposed.png') }}">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL::asset('public/theme/assets/images/apple-touch-icon-144-precomposed.png') }}">    <!-- For iPad Retina display -->




        <!-- CORE CSS FRAMEWORK - START -->
        <link href="{{ URL::asset('public/theme/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" media="screen"/>
        <link href="{{ URL::asset('public/theme/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/theme/assets/plugins/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/theme/assets/fonts/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/theme/assets/css/animate.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/theme/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->

        <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        
        
<link href="{{ URL::asset('public/theme/assets/plugins/icheck/skins/all.css') }}" rel="stylesheet" type="text/css" media="screen"/>

        <!-- HEADER SCRIPTS INCLUDED ON THIS PAGE - END --> 


        <!-- CORE CSS TEMPLATE - START -->
        <link href="{{ URL::asset('public/theme/assets/css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('public/theme/assets/css/responsive.css') }}" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" login_page">



   @yield('content')
       

<!-- MAIN CONTENT AREA ENDS -->
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

<script src="{{ URL::asset('public/theme/assets/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


<!-- CORE TEMPLATE JS - START --> 
<script src="{{ URL::asset('public/theme/assets/js/scripts.js') }}" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 

</body>
</html>

