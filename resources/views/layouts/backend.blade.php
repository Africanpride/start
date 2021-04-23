@include('layouts.backend-partials.head')

<body>

   <!-- Offcanval Overlay -->
   <div class="offcanvas-overlay"></div>
   <!-- Offcanval Overlay -->

   <!-- Wrapper -->
   <div class="wrapper">

@include('layouts.backend-partials.header')

      <!-- Main Wrapper -->
      <div class="main-wrapper">
<!-- Nav -->
@include('layouts.backend-partials.nav')

<!--End Nav -->

         <!-- Main Content -->
         <div class="main-content">
            <div class="container-fluid">
               @yield('content')
            </div>
         </div>
         <!-- End Main Content -->
      </div>
      <!-- End Main Wrapper -->

      <!-- Footer with scripts -->
     @include('layouts.backend-partials.footer')
      <!-- End Footer -->

