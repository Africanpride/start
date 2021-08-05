@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Card -->
            <div class="card bg-transparent">
                <div class="card-body bg-white mb-30">
                    <!-- Mail Header -->

                    {{-- {{ alert()->success('SuccessAlert','Lorem ipsum dolor sit amet.')->showConfirmButton('Confirm', '#3085d6') }} --}}

                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- Card -->
            <div class="card bg-transparent">
                <div class="card-body bg-white mb-30">
                    <!-- Mail Header -->
                    <div class="mail-header d-flex align-items-sm-center media flex-column flex-sm-row">
                        <div class="mail-header-left d-flex align-items-center position-relative">
                            <!-- Custom Checkbox -->
                            <label class="custom-checkbox style--two">
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <!-- End Custom Checkbox -->

                            <!-- Dropdown Button -->
                            <div class="dropdown-button">
                                <a href="#" class="d-flex align-items-center" data-toggle="dropdown">
                                    <div class="menu-icon style--two justify-content-center mr-0">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <div class="dropdown-menu">
                                    <a href="#">Daily</a>
                                    <a href="#">Sort By</a>
                                    <a href="#">Monthly</a>
                                </div>
                            </div>
                            <!-- End Dropdown Button -->

                            <!-- Starred -->
                            <div class="star">
                                <a href="#"><img
                                        src=" {{ asset('backend/assets/img/svg/star.svg') }} "
                                        alt="" class="svg"></a>
                            </div>
                            <!-- End Starred -->

                            <!-- Unread Mail -->
                            <div class="unread">
                                <a href="#"><img
                                        src=" {{ asset('backend/assets/img/svg/mail.svg') }} "
                                        alt="" class="svg"></a>
                            </div>
                            <!-- End Unread Mail -->

                            <!-- Tag Mail -->
                            <div class="tag_mail">
                                <a href="#"><img
                                        src=" {{ asset('backend/assets/img/svg/tag.svg') }} "
                                        alt="" class="svg"></a>
                            </div>
                            <!-- End Tag Mail -->

                            <!-- Delete Mail -->
                            <div class="delete_mail">
                                <a href="#"><img
                                        src=" {{ asset('backend/assets/img/svg/delete.svg') }} "
                                        alt="" class="svg"></a>
                            </div>
                            <!-- End Delete Mail -->
                        </div>

                        <div
                            class="mail-header-right d-flex align-items-center justify-content-end media-body mt-3 mt-sm-0">
                            <!-- Search Form -->
                            <form action="#" class="search-form">
                                <div class="theme-input-group">
                                    <input type="text" class="theme-input-style" placeholder="Search Here">

                                    <button type="submit"><img
                                            src=" {{ asset('backend/assets/img/svg/search-icon.svg') }} "
                                            alt="" class="svg"></button>
                                </div>
                            </form>
                            <!-- End Search Form -->

                            <!-- Pagination -->
                            <div class="pagination style--two d-flex flex-column align-items-center ml-3">
                                <ul class="list-inline d-inline-flex align-items-center">
                                    <li><a href="#">
                                            <img src=" {{ asset('backend/assets/img/svg/left-angle.svg') }} "
                                                alt="" class="svg">
                                        </a></li>
                                    <li><a href="#" class="current">
                                            <img src=" {{ asset('backend/assets/img/svg/right-angle.svg') }} "
                                                alt="" class="svg">
                                        </a></li>
                                </ul>
                            </div>
                            <!-- End Pagination -->
                        </div>
                    </div>
                    <!-- End Mail Header -->
                </div>

                <!-- Message List -->
                <ul class="list-unstyled mail-list">
                    <!-- Message Item List -->
                    <li class="mail-list-item">
                        <div class="d-flex justify-content-between align-items-sm-center media flex-column flex-sm-row">
                            <div class="d-flex align-items-center media-body position-relative">
                                <!-- Custom Checkbox -->
                                <label class="custom-checkbox style--three">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <!-- End Custom Checkbox -->

                                <!-- Dropdown Button -->
                                <div class="dropdown-button ml-4">
                                    <a href="#" class="d-flex align-items-center" data-toggle="dropdown">
                                        <div class="menu-icon style--two w-14 mr-0">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="#">Daily</a>
                                        <a href="#">Sort By</a>
                                        <a href="#">Monthly</a>
                                    </div>
                                </div>
                                <!-- End Dropdown Button -->

                                <!-- Message Text -->
                                <a href="read.html" class="d-flex align-items-center mail-text">
                                    <div class="avatar">
                                        <img src=" {{ asset('backend/assets/img/avatar/m5.png') }} "
                                            alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="name mb-1">Sandra Jones</h4>
                                        <p class="msg">Why Do All Websites Look the Same? by Boris Müller</p>
                                    </div>
                                </a>
                                <!-- End Message Text -->
                            </div>

                            <div class="mail-list-item-right d-flex align-items-center">
                                <!-- Mail Date -->
                                <div class="mail-date bold"> 8:35am </div>
                                <!-- End Mail Date -->

                                <button type="button" class="status-btn work">Work</button>

                                <!-- Starred -->
                                <div class="star">
                                    <a href="#"><img
                                            src=" {{ asset('backend/assets/img/svg/star.svg') }} "
                                            alt="" class="svg"></a>
                                </div>
                                <!-- End Starred -->

                                <!-- Delete Mail -->
                                <div class="delete_mail">
                                    <a href="#"><img
                                            src=" {{ asset('backend/assets/img/svg/delete.svg') }} "
                                            alt="" class="svg"></a>
                                </div>
                                <!-- End Delete Mail -->
                            </div>
                        </div>
                    </li>
                    <!-- End Message Item List -->

                    <!-- Message Item List -->
                    <li class="mail-list-item">
                        <div class="d-flex justify-content-between align-items-sm-center media flex-column flex-sm-row">
                            <div class="d-flex align-items-center media-body position-relative">
                                <!-- Custom Checkbox -->
                                <label class="custom-checkbox style--three">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <!-- End Custom Checkbox -->

                                <!-- Dropdown Button -->
                                <div class="dropdown-button ml-4">
                                    <a href="#" class="d-flex align-items-center" data-toggle="dropdown">
                                        <div class="menu-icon style--two w-14 mr-0">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="#">Daily</a>
                                        <a href="#">Sort By</a>
                                        <a href="#">Monthly</a>
                                    </div>
                                </div>
                                <!-- End Dropdown Button -->

                                <!-- Message Text -->
                                <a href="read.html" class="d-flex align-items-center mail-text">
                                    <div class="avatar">
                                        <img src=" {{ asset('backend/assets/img/avatar/m7.png') }} "
                                            alt="">
                                    </div>
                                    <div class="content">
                                        <h4 class="name mb-1">Frazer Moyer</h4>
                                        <p class="msg">Why Do All Websites Look the Same? by Boris Müller</p>
                                    </div>
                                </a>
                                <!-- End Message Text -->
                            </div>

                            <div class="mail-list-item-right d-flex align-items-center">
                                <!-- Mail Date -->
                                <div class="mail-date bold"> 7:17am </div>
                                <!-- End Mail Date -->

                                <button type="button" class="status-btn friend">Friends</button>

                                <!-- Starred -->
                                <div class="star">
                                    <a href="#"><img
                                            src=" {{ asset('backend/assets/img/svg/star2.svg') }} "
                                            alt="" class="svg"></a>
                                </div>
                                <!-- End Starred -->

                                <!-- Delete Mail -->
                                <div class="delete_mail">
                                    <a href="#"><img
                                            src=" {{ asset('backend/assets/img/svg/delete.svg') }} "
                                            alt="" class="svg"></a>
                                </div>
                                <!-- End Delete Mail -->
                            </div>
                        </div>
                    </li>
                    <!-- End Message Item List -->

                    <!-- End Message Item List -->
                </ul>
                <!-- End Message List -->
            </div>
            <!-- End Card -->
        </div>
    </div>
</div>
@endsection

