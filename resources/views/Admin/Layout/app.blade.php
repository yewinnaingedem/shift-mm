<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('storage/main/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('storage/main/assets/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('storage/main/assets/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('storage/main/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('storage/main/assets/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('storage/main/assets/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('storage/main/assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('storage/main/assets/images/favicon.png')}}" />
    @yield('style')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
        @section('sidebar')
            @include('Admin.Layout.sidebar')
        @show 
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @section('navbar')
            @include('Admin/Layout/navbar')
        @show 
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
            

            @section('footer') 
              @include('Admin/Layout/footer')
            @show 
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('storage/main/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->

    <script src="{{asset('storage/main/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('storage/main/assets/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('storage/main/assets/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('storage/main/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('storage/main/assets/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>
    <script src="{{asset('storage/main/assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
    
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('storage/main/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('storage/main/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('storage/main/assets/js/misc.js')}}"></script>
    <script src="{{asset('storage/main/assets/js/settings.js')}}"></script>
    <script src="{{asset('storage/main/assets/js/todolist.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('storage/main/assets/js/dashboard.js')}}"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- End custom js for this page -->
    @yield('script')
  </body>
</html>