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
                     <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }} ">
                         <a href="{{ route('dashboard')}}">
                             <i class="icofont-pie-chart"></i>
                             <span class="link-title">Dashboard</span>
                         </a>
                     </li>
                     <li class="{{ Request::routeIs('comment.index') ? 'active' : '' }}">
                         <a href="{{ route('comment.index')}}">
                             <i class="icofont-chat"></i>
                             <span class="link-title">Comments</span>
                         </a>
                     </li>
                     <li class="{{ strpos(url()->current() , 'articles') ? 'active' : '' }}">
                         <a href="{{ route('articles.index')}}">

                             <i class="icofont-listing-box"></i>
                             <span class="link-title">Articles</span>
                         </a>
                     </li>
                     <li class="{{ strpos(url()->current() , 'products') ? 'active' : '' }}">
                         <a href="{{ route('products.index')}}">

                            <i class="icofont-vehicle-delivery-van"></i>
                            <span class="link-title">Product Details</span>
                         </a>
                           <!-- Sub Menu -->
                            <ul class="nav sub-menu">
                                <li><a href="{{ route('products.index') }}">Available Products</a></li>
                                <li><a href="{{ route('products.create') }}">Create Product</a></li>
                                <li><a href="{{ route('products.index') }}">Product Specifications</a></li>
                                <li><a href="{{ route('products.categories') }}">Product Categories</a></li>
                            </ul>
                            <!-- End Sub Menu -->
                     </li>
                     <li class="{{ strpos(url()->current() , 'services') ? 'active' : '' }}">
                        <a href="{{ route('articles.index')}}">

                            <i class="icofont-architecture-alt"></i>
                            <span class="link-title">Service Details</span>
                        </a>
                          <!-- Sub Menu -->
                           <ul class="nav sub-menu">
                               <li><a href="{{ route('services.index') }}">Available services</a></li>
                               <li><a href="{{ route('services.create') }}">Create Service</a></li>
                               <li><a href="{{ route('services.index') }}">Service Specifications</a></li>
                               <li><a href="{{ route('services.index') }}">Service Categories</a></li>
                           </ul>
                           <!-- End Sub Menu -->
                    </li>
                     <li class="{{ Request::routeIs('analytics') ? 'active' : '' }}">
                         <a href="{{ route('analytics')}}">
                             <i class="icofont-dashboard-web"></i>
                             <span class="link-title">Social Media Analytics</span>
                         </a>
                     </li>
                     <li class="{{ Request::routeIs('chat') ? 'active' : '' }}">
                         <a href="#">
                             <i class="icofont-at"></i>
                             <span class="link-title">Chat/Email</span>
                         </a>
                     </li>
                     <li class="{{ Request::routeIs('seo') ? 'active' : '' }}">
                         <a href="{{ route('seo') }}">
                             <i class="icofont-bars"></i>
                             <span class="link-title">SEO</span>
                         </a>
                     </li>
                     <li class="{{ Request::routeIs('website-analytics') ? 'active' : '' }}">
                         <a href="#">
                             <i class="icofont-chart-histogram"></i>
                             <span class="link-title">Website Analytics</span>
                         </a>
                     </li>
                     <li class="{{ Request::routeIs('users') ? 'active' : '' }}">
                         <a href="{{ route('users') }}">
                             <i class="icofont-contact-add"></i>
                             <span class="link-title">User Management</span>
                         </a>
                     </li>

                 </ul>
                 @auth


                 <hr>


                 <ul class="nav">
                     <li>
                        <i class="icofont-ui-user"></i>
                         <a href="{{ route('profile.show', [Auth::user()->profile->uuid]) }}">My Profile</a></li>
                     <li>
                        <i class="icofont-logout"></i>
                        <form method="POST" action="{{ route('logout') }}">
                             @csrf
                             <a href="route('logout')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                 {{ __('Log Out') }}
                             </a>
                         </form>
                     </li>
                 </ul>
                 @endauth

                 <!-- End Nav -->
             </div>
             <!-- End Sidebar Body -->
         </nav>
         <!-- End Sidebar -->
