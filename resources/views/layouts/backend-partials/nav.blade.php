         <!-- Sidebar -->
         <nav class="sidebar" data-trigger="scrollbar">
            <!-- Sidebar Header -->
            <div class="sidebar-header d-none d-lg-block">
               <!-- Sidebar Toggle Pin Button -->
               <div class="sidebar-toogle-pin">
                  <i class="icofont-tack-pin"></i>
               </div>
               <!-- End Sidebar Toggle Pin Button -->
            </div>
            <!-- End Sidebar Header -->

            <!-- Sidebar Body -->
            <div class="sidebar-body">
               <!-- Nav -->
               <ul class="nav">
                  <li class="nav-category">Main</li>
                  <li  class="{{ str_contains(Route::currentRouteName(), 'dashboard') ? ' active' : ' ' }}">
                    <a href="{{ route('dashboard')}}">
                        <i class="icofont-pie-chart"></i>
                        <span class="link-title">Dashboard</span>
                     </a>
                  </li>
                  <li  class="{{ str_contains(Route::currentRouteName(), 'comments') ? ' active' : ' ' }}">
                     <a href="#">
                        <i class="icofont-chat"></i>
                        <span class="link-title">Comments</span>
                     </a>
                  </li>
                  <li  class="{{ str_contains(Route::currentRouteName(), 'article') ? ' active' : ' ' }}">
                    <a href="{{ route('articles.index')}}">

                        <i class="icofont-listing-box"></i>
                        <span class="link-title">Articles</span>
                     </a>
                  </li>
                  <li  class="{{ str_contains(Route::currentRouteName(), 'analytics') ? ' active' : ' ' }}">
                     <a href="{{ url('analytics')}}">
                        <i class="icofont-dashboard-web"></i>
                        <span class="link-title">Social Media Analytics</span>
                     </a>
                  </li>
                  <li  class="{{ str_contains(Route::currentRouteName(), 'chat') ? ' active' : ' ' }}">
                     <a href="#">
                        <i class="icofont-at"></i>
                        <span class="link-title">Chat/Email</span>
                     </a>
                  </li>
                  <li  class="{{ str_contains(Route::currentRouteName(), 'seo') ? ' active' : ' ' }}">
                     <a href="#">
                        <i class="icofont-bars"></i>
                        <span class="link-title">SEO</span>
                     </a>
                  </li>
                  <li  class="{{ str_contains(Route::currentRouteName(), 'website-analytics') ? ' active' : ' ' }}">
                     <a href="#">
                        <i class="icofont-chart-histogram"></i>
                        <span class="link-title">Website Analytics</span>
                     </a>
                  </li>
                  <li  class="{{ str_contains(Route::currentRouteName(), 'users') ? ' active' : ' ' }}">
                     <a href="{{ route('users') }}">
                        <i class="icofont-contact-add"></i>
                        <span class="link-title">User Management</span>
                     </a>
                  </li>

               </ul>
               <!-- End Nav -->
            </div>
            <!-- End Sidebar Body -->
         </nav>
         <!-- End Sidebar -->
