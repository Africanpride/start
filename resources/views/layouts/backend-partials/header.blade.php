      <!-- Header -->
      <header class="header white-bg fixed-top d-flex align-content-center flex-wrap">
        <!-- Logo -->
        <div class="logo">
           <a href="{{ route('dashboard') }}" class="default-logo"><img src = " {{ asset('backend/assets/img/logo.png') }}" alt=""></a>
           <a href="{{ route('dashboard') }}" class="mobile-logo"><img src = " {{ asset('backend/assets/img/mobile-logo.png') }}" alt=""></a>
        </div>
        <!-- End Logo -->

        <!-- Main Header -->
        <div class="main-header">
           <div class="container-fluid">
              <div class="row justify-content-between">
                 <div class="col-3 col-lg-1 col-xl-4">
                    <!-- Header Left -->
                    <div class="main-header-left h-100 d-flex align-items-center">


                       <!-- Main Header Menu -->
                       <div class="main-header-menu d-block d-lg-none">
                          <div class="header-toogle-menu">
                             <!-- <i class="icofont-navigation-menu"></i> -->
                             <img src = " {{ asset('backend/assets/img/menu.png') }}" alt="">
                          </div>
                       </div>
                       <!-- End Main Header Menu -->
                    </div>
                    <!-- End Header Left -->
                 </div>
                 <div class="col-9 col-lg-11 col-xl-8">
                    <!-- Header Right -->
                    <div class="main-header-right d-flex justify-content-end">
                       <ul class="nav">
                        <li class="order-2 order-sm-0">
                            <!-- Main Header Search -->
                            <div class="main-header-search">
                               <form action="#" class="search-form">
                                  <div class="theme-input-group header-search">
                                     <input type="text" class="theme-input-style" placeholder="Search Here">

                                     <button type="submit">
                                         <img src = " {{ asset('backend/assets/img/svg/search-icon.svg ') }}" alt="" class="svg">
                                      </button>
                                  </div>
                               </form>
                            </div>
                            <!-- End Main Header Search -->
                         </li>


                          <li class="d-none d-lg-flex">
                             <!-- Main Header Time -->
                             <div class="main-header-date-time text-right">
                                <h3 class="time">
                                   <span id="hours">21</span>
                                   <span id="point">:</span>
                                   <span id="min">06</span>
                                </h3>
                                <span class="date"><span id="date">Tue, 12 October 2019</span></span>
                             </div>
                             <!-- End Main Header Time -->
                          </li>

                          <li class="d-none d-lg-flex">
                             <!-- Main Header Button -->
                             <div class="main-header-btn ml-md-1">
                                <a href="{{ route('articles.create')}}" class="btn">
                                    <img src="{{ asset('backend/assets/img/svg/plus_white.svg') }}" alt="" class="svg mr-1"> Create New Article</a>
                             </div>
                             <!-- End Main Header Button -->
                          </li>

                          <li class="ml-0">
                            <!-- Main Header Language -->
                            <div class="main-header-language">
                               <a href="#" data-toggle="dropdown">
                                  <img src = "{{ asset('backend/assets/img/svg/globe-icon.svg ') }}" alt="">
                               </a>
                               <div class="dropdown-menu style--three">
                                  <a href="#">
                                     <span><img src = "{{ asset('backend/assets/img/usa.png') }}" alt=""></span>
                                     English
                                  </a>

                                  <a href="#">
                                     <span><img src = "{{ asset('backend/assets/img/france.png') }}" alt=""></span>
                                     French
                                  </a>

                               </div>
                            </div>
                            <!-- End Main Header Language -->
                         </li>
                         <li>
                                                    <!-- Main Header User -->
                       <div class="main-header-user">
                        <a href="#" class="d-flex align-items-center" data-toggle="dropdown">
                          <div class="avatar mr-20">
                            @auth
                              <img src="{{ '/backend/assets/img/avatar/'. Auth::user()->profile->avatar }}" alt="">
                              <span class="avatar-status bg-teal"></span>
                            @else
                            <img src="{{ asset('backend/assets/img/avatar/avatar-user.png') }}" alt="">
                            {{-- Make red or green based on online status --}}
                            <span class="avatar-status bg-teal"></span>
                            @endauth
                          </div>
                        </a>
                        @auth
                        <div class="dropdown-menu">

                            <a href="{{ route('profile.show', [Auth::user()->profile->uuid]) }}">My Profile</a>

                           <a href="#">task</a>
                           <a href="#">Settings</a>

                           <form method="POST" action="{{ route('logout') }}">
                              @csrf

                              <a href="route('logout')"
                                               onclick="event.preventDefault();
                                              this.closest('form').submit();">
                                  {{ __('Log Out') }}
                           </a>
                          </form>

                        </div>
                        @endauth
                     </div>
                     <!-- End Main Header User -->
                         </li>



                       </ul>
                    </div>
                    <!-- End Header Right -->
                 </div>
              </div>
           </div>
        </div>
        <!-- End Main Header -->
     </header>
     <!-- End Header -->
