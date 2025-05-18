<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>User Panel - @yield('title')</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="{{ asset('assets/backend/client') }}/images/fevicon.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('assets/backend/client') }}/css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="{{ asset('assets/backend/client') }}/style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{ asset('assets/backend/client') }}/css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="{{ asset('assets/backend/client') }}/css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{ asset('assets/backend/client') }}/css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{ asset('assets/backend/client') }}/css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{ asset('assets/backend/client') }}/css/custom.css" />
      @yield('style')
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            @include('backend.client.layouts.sidebar')
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  @include('backend.client.layouts.header')
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  @yield('content')
                  @include('backend.client.layouts.footer')
               </div>
               
               <!-- end dashboard inner -->

               <!-- footer -->

               <!-- end footer -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="{{ asset('assets/backend/client') }}/js/jquery.min.js"></script>
      <script src="{{ asset('assets/backend/client') }}/js/popper.min.js"></script>
      <script src="{{ asset('assets/backend/client') }}/js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="{{ asset('assets/backend/client') }}/js/animate.js"></script>
      <!-- owl carousel -->
      <script src="{{ asset('assets/backend/client') }}/js/owl.carousel.js"></script> 

      <!-- nice scrollbar -->
      <script src="{{ asset('assets/backend/client') }}/js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{ asset('assets/backend/client') }}/js/custom.js"></script>
      <script src="{{ asset('assets/backend/client') }}/js/chart_custom_style1.js"></script>
      @yield('scripts')
   </body>
</html>