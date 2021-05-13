@extends('layouts.backend')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- User Profile Image -->
            <div class="user-profile-img">
                <div class="cover-img">
                    <img src="{{ asset('backend/assets/img/svg/banner.svg') }}" class="w-100"
                        alt="">

                </div>
            </div>
            <!-- End User Profile Image -->
        </div>


        <div class="mx-2 mx-lg-4 mx-xl-5">
            <div class="card mt-1">
                <!-- User Profile Nav -->
                <div
                    class="user-profile-nav d-flex justify-content-xl-between align-items-xl-center flex-column flex-xl-row">

                    <!-- Profile Info -->
                    <div class="profile-info d-flex align-items-center">
                        <div class="profile-pic mr-3">
                            <img src="{{ '/backend/assets/img/avatar/'. $profile->avatar }}"
                                alt="">
                        </div>

                        <div>
                            <h3>{{ $profile->user->first_name .' '. $profile->user->last_name }}
                            </h3>
                            <p class="font-14">{{ $profile->user->role }}</p>
                        </div>
                    </div>

                </div>
                <!-- End User Profile Nav -->
            </div>
            <!-- Card -->

            <div class="pt-30">
                <ul class="nav nav-pills pills-switch" id="pills-tab" role="tablist">
                    <li class="nav-item flex-sm-fill text-sm-center">
                        <a class="nav-link active tab-switch" id="pills-overview-tab" data-toggle="pill"
                            href="#pills-overview" role="tab" aria-controls="pills-overview"
                            aria-selected="true">Overview</a>
                    </li>
                    <li class="nav-item flex-sm-fill text-sm-center">
                        <a class="nav-link  tab-switch" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                    </li>
                    <li class="nav-item flex-sm-fill text-sm-center">
                        <a class="nav-link  tab-switch" id="pills-profile-edit-tab" data-toggle="pill"
                            href="#pills-profile-edit" role="tab" aria-controls="pills-profile-edit"
                            aria-selected="false">Edit Profile & Settings</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                        aria-labelledby="pills-overview-tab">

                        <div class="">
                            <!-- Profile Completion -->
                            <div class="profile-completion d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <!-- Progress -->
                                    <div class="progress_22 mr-3">
                                        <div class="ProgressBar-wrap2 position-relative">
                                            <div class="ProgressBar ProgressBar_22" data-progress="66">
                                                <svg class="ProgressBar-contentCircle" viewBox="0 0 200 200">
                                                    <!-- on rotation circle -->
                                                    <circle transform="rotate(-90, 100, 100)"
                                                        class="ProgressBar-background" cx="100" cy="100" r="85" />
                                                    <circle transform="rotate(-90, 100, 100)" class="ProgressBar-circle"
                                                        cx="100" cy="100" r="85" />
                                                </svg>

                                                <span
                                                    class="ProgressBar-percentage ProgressBar-percentage--count"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Progress -->

                                    <div class="">
                                        <h4 class="c2 mb-1">Profile Completion</h4>
                                        <p class="font-14">Praesent tempor dictum tellus ut molestie. Sed sed
                                            ullamcorper lorem, id
                                            faucibus odio. 123</p>
                                    </div>
                                </div>

                                <!-- Edit Profile Button -->
                                <div class="edit-profile-btn pr-1">
                                    <a href="edit-profile.html" class="btn-circle">
                                        <img src="{{ asset('backend/assets/img/svg/writing.svg') }}"
                                            alt="" class="svg">
                                    </a>
                                </div>
                                <!-- End Edit Profile Button -->
                            </div>
                            <!-- End Profile Completion -->

                            <div class="mt-30"></div>
                            <div class="mt-30">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-4 col-sm-6">
                                        <!-- Card -->
                                        <div class="card mb-30">
                                            <div
                                                class="statistics-bounce-rate d-flex align-items-center justify-content-between">
                                                <div class="state-content">
                                                    <p class="font-14 mb-2">Member Profit</p>
                                                    <h3>&#36;25k</h3>
                                                </div>
                                                <div class="state-icon">
                                                    <img src="{{ asset('backend/assets/img/png-icon/bar.png') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>

                                    <div class="col-xl-2 col-lg-4 col-sm-6">
                                        <!-- Card -->
                                        <div class="card mb-30">
                                            <div
                                                class="statistics-bounce-rate order style--two d-flex align-items-center justify-content-between">
                                                <div class="state-content">
                                                    <p class="font-14 mb-2">Orders</p>
                                                    <h3>568</h3>
                                                </div>
                                                <div class="state-icon">
                                                    <img src="{{ asset('backend/assets/img/png-icon/badge.png') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>

                                    <div class="col-xl-2 col-lg-4 col-sm-6">
                                        <!-- Card -->
                                        <div class="card mb-30">
                                            <div
                                                class="statistics-bounce-rate report d-flex align-items-center justify-content-between">
                                                <div class="state-content">
                                                    <p class="font-14 mb-2">Issue Reports</p>
                                                    <h3>165</h3>
                                                </div>
                                                <div class="state-icon">
                                                    <img src="{{ asset('backend/assets/img/png-icon/report.png') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>

                                    <div class="col-xl-2 col-lg-4 col-sm-6">
                                        <!-- Card -->
                                        <div class="card mb-30">
                                            <div
                                                class="statistics-bounce-rate support d-flex align-items-center justify-content-between">
                                                <div class="state-content">
                                                    <p class="font-14 mb-2">Customer Support</p>
                                                    <h3>354</h3>
                                                </div>
                                                <div class="state-icon">
                                                    <img src="{{ asset('backend/assets/img/png-icon/what.png') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>

                                    <div class="col-xl-4 col-lg-8">
                                        <div class="project-deadline d-flex align-items-center c2-bg mb-30">
                                            <!-- Progress -->
                                            <div class="progress_23 mr-3">
                                                <div class="ProgressBar-wrap2 position-relative">
                                                    <div class="ProgressBar ProgressBar_23" data-progress="75">
                                                        <svg class="ProgressBar-contentCircle" viewBox="0 0 200 200">
                                                            <!-- on rotation circle -->
                                                            <circle transform="rotate(-90, 100, 100)"
                                                                class="ProgressBar-background" cx="100" cy="100"
                                                                r="85" />
                                                            <circle transform="rotate(-90, 100, 100)"
                                                                class="ProgressBar-circle" cx="100" cy="100" r="85" />
                                                        </svg>

                                                        <span
                                                            class="ProgressBar-percentage ProgressBar-percentage--count"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Progress -->

                                            <div class="">
                                                <h4 class="white font-20 mb-1">Project Deadline</h4>
                                                <p>Vestibulum blandit viverra convallis. Pellentesque ligula
                                                    urnafermentum ut semper
                                                    intincidunt nec.</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <!-- End Card -->
                        </div>


                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                        <div class="">


                            <!-- Card -->
                            <div class="card">
                                <div class="p-30">
                                    <div class="about-myself mt-2 pb-2">
                                        <h4 class="mb-3">About
                                            {{ $profile->user->first_name .' '. $profile->user->last_name }}
                                        </h4>
                                        <p>{{ $profile->bio }}</p>
                                    </div>


                                </div>
                            </div>


                            <div class="mt-30"></div>
                            <div class="mt-30">
                                <div class="row">
                                    <div class="col-xl-2 col-lg-4 col-sm-6">
                                        <!-- Card -->
                                        <div class="card mb-30">
                                            <div
                                                class="statistics-bounce-rate d-flex align-items-center justify-content-between">
                                                <div class="state-content">
                                                    <p class="font-14 mb-2">Member Profit</p>
                                                    <h3>&#36;25k</h3>
                                                </div>
                                                <div class="state-icon">
                                                    <img src="{{ asset('backend/assets/img/png-icon/bar.png') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>

                                    <div class="col-xl-2 col-lg-4 col-sm-6">
                                        <!-- Card -->
                                        <div class="card mb-30">
                                            <div
                                                class="statistics-bounce-rate order style--two d-flex align-items-center justify-content-between">
                                                <div class="state-content">
                                                    <p class="font-14 mb-2">Orders</p>
                                                    <h3>568</h3>
                                                </div>
                                                <div class="state-icon">
                                                    <img src="{{ asset('backend/assets/img/png-icon/badge.png') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>

                                    <div class="col-xl-2 col-lg-4 col-sm-6">
                                        <!-- Card -->
                                        <div class="card mb-30">
                                            <div
                                                class="statistics-bounce-rate report d-flex align-items-center justify-content-between">
                                                <div class="state-content">
                                                    <p class="font-14 mb-2">Issue Reports</p>
                                                    <h3>165</h3>
                                                </div>
                                                <div class="state-icon">
                                                    <img src="{{ asset('backend/assets/img/png-icon/report.png') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>

                                    <div class="col-xl-2 col-lg-4 col-sm-6">
                                        <!-- Card -->
                                        <div class="card mb-30">
                                            <div
                                                class="statistics-bounce-rate support d-flex align-items-center justify-content-between">
                                                <div class="state-content">
                                                    <p class="font-14 mb-2">Customer Support</p>
                                                    <h3>354</h3>
                                                </div>
                                                <div class="state-icon">
                                                    <img src="{{ asset('backend/assets/img/png-icon/what.png') }}"
                                                        alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Card -->
                                    </div>

                                    <div class="col-xl-4 col-lg-8">
                                        <div class="project-deadline d-flex align-items-center c2-bg mb-30">
                                            <!-- Progress -->
                                            <div class="progress_23 mr-3">
                                                <div class="ProgressBar-wrap2 position-relative">
                                                    <div class="ProgressBar ProgressBar_23" data-progress="75">
                                                        <svg class="ProgressBar-contentCircle" viewBox="0 0 200 200">
                                                            <!-- on rotation circle -->
                                                            <circle transform="rotate(-90, 100, 100)"
                                                                class="ProgressBar-background" cx="100" cy="100"
                                                                r="85" />
                                                            <circle transform="rotate(-90, 100, 100)"
                                                                class="ProgressBar-circle" cx="100" cy="100" r="85" />
                                                        </svg>

                                                        <span
                                                            class="ProgressBar-percentage ProgressBar-percentage--count"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Progress -->

                                            <div class="">
                                                <h4 class="white font-20 mb-1">Project Deadline</h4>
                                                <p>Vestibulum blandit viverra convallis. Pellentesque ligula
                                                    urnafermentum ut semper
                                                    intincidunt nec.</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <!-- End Card -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile-edit" role="tabpanel"
                        aria-labelledby="pills-profile-edit-tab">

                        <div class="">


                            <!-- Card -->
                            <div class="card">
                                <div class="p-30">
                                    <div class="about-myself mt-2 pb-2">
                                        <!-- Form -->

                                        <form action="{{ route('profile.update', $profile->uuid) }}"
                                            id="profile_form" name="profile_form" accept-charset="UTF-8"
                                            class="form-horizontal" method="POST">
                                            @method('PATCH')
                                            @csrf


                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!-- Card -->
                                                    <div class="card">
                                                        <div class="card-body p-30">
                                                            <div class="about-myself mb-5">
                                                                <h4 class="mb-3">About Myself</h4>

                                                                <textarea form="profile_form"
                                                                    class="theme-input-style style--two" name="bio"
                                                                    placeholder="{{ old('bio', optional ($profile)->bio) }} "
                                                                    wrap="hard">
                                                                    {{ $profile->bio }}
                                                                 </textarea>
                                                            </div>

                                                            <!-- Edit Personal Info -->
                                                            <div class="edit-personal-info mb-5">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <h4 class="mb-3">Personal Information</h4>
                                                                    </div>
                                                                </div>

                                                                <!-- Form Group -->
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-3">
                                                                        <label for="edit-fname">First Name</label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <input id="edit-fname" class="form-control"
                                                                            name="first_name" type="text"
                                                                            value="{{ old('first_name', optional($user)->first_name) }}"
                                                                            minlength="1" maxlength="400"
                                                                            required="true"
                                                                            placeholder="Enter First here...">
                                                                    </div>
                                                                </div>
                                                                <!-- End Form Group -->

                                                                <!-- Form Group -->
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-3">
                                                                        <label for="edit-lname">Last Name</label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <input id="edit-fname" class="form-control"
                                                                            name="last_name" type="text"
                                                                            value="{{ old('last_name', optional($user)->last_name) }}"
                                                                            minlength="1" maxlength="400"
                                                                            required="true"
                                                                            placeholder="Enter last here...">
                                                                    </div>
                                                                </div>
                                                                <!-- End Form Group -->
                                                                <!-- Form Group -->
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-3">
                                                                        <label for="edit-lname">Email</label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <input id="edit-fname" class="form-control"
                                                                            name="email" type="text"
                                                                            value="{{ old('email', optional($user)->email) }}"
                                                                            minlength="1" maxlength="400"
                                                                            required="true" placeholder="Email Address">
                                                                    </div>
                                                                </div>
                                                                <!-- End Form Group -->

                                                                <!-- Form Group -->
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-3">
                                                                        <label for="edit-lname">Role</label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <input id="edit-fname" class="form-control"
                                                                            name="role" type="text"
                                                                            value="{{ old('role', optional ($user)->role) }}"
                                                                            minlength="1" maxlength="400"
                                                                            required="true" placeholder="Role">
                                                                    </div>
                                                                </div>
                                                                <!-- End Form Group -->

                                                                <!-- Form Group -->
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-3">
                                                                        <label for="edit-address">Address</label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <input type="text" id="edit-address"
                                                                            name="address1" class="form-control"
                                                                            value="{{ old('address1', optional ($profile)->address1) }}">
                                                                    </div>
                                                                </div>
                                                                <!-- End Form Group -->

                                                                <!-- Form Group -->
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-3">
                                                                        <label for="edit-phone">Phone</label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <input type="text" id="edit-phone"
                                                                            class="form-control" name="phone"
                                                                            value="{{ old('phone', optional ($profile)->phone) }}">
                                                                        <span class="font-12 c4">**We'll never share
                                                                            your phone no with anyone else.</span>
                                                                    </div>
                                                                </div>
                                                                <!-- End Form Group -->
                                                                <!-- Form Group -->
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-3">
                                                                        <label for="edit-phone">LinkedIn</label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <input type="text" id="edit-linkedin"
                                                                            class="form-control" name="linkedin"
                                                                            value="{{ old('linkedin', optional ($profile)->linkedin) }}"
                                                                            placeholder="Add Linkedin handle... https://www.linkedin.com/{{ config('app.company_name') }}">
                                                                    </div>
                                                                </div>
                                                                <!-- End Form Group -->
                                                                <!-- Form Group -->
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-3">
                                                                        <label for="edit-phone">Twitter</label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <input type="text" id="edit-linkedin"
                                                                            class="form-control" name="twitter"
                                                                            value="{{ old('twitter', optional ($profile)->twitter) }}"
                                                                            placeholder="Add twitter handle... https://www.twitter.com/{{ config('app.company_name') }}">

                                                                    </div>
                                                                </div>
                                                                <!-- End Form Group -->
                                                                <!-- Form Group -->
                                                                <div class="form-group row align-items-center">
                                                                    <div class="col-3">
                                                                        <label for="edit-phone">Facebook</label>
                                                                    </div>
                                                                    <div class="col-9">
                                                                        <input type="text" id="edit-linkedin"
                                                                            class="form-control" name="facebook"
                                                                            value="{{ old('facebook', optional ($profile)->facebook) }}"
                                                                            placeholder="Add facebook handle... https://www.facebook.com/{{ config('app.company_name') }}">

                                                                    </div>
                                                                </div>
                                                                <!-- End Form Group -->


                                                            </div>
                                                            <!-- End Edit Personal Info -->

                                                        </div>
                                                    </div>
                                                    <!-- End Card -->
                                                </div>

                                                <div class="col-xl-6">
                                                    <!-- Card -->
                                                    <div class="card mb-30">
                                                        <div class="card-body p-30">
                                                            <!-- Account Setting -->
                                                            <div class="account-setting">

                                                                <div>
                                                                    <h4 class="mb-20 pt-2">Account Setting</h4>
                                                                </div>

                                                                <!-- Form Group -->
                                                                <div class="form-group mb-4 d-flex align-items-center">
                                                                    <div class="mr-3">
                                                                        <!-- Switch -->
                                                                        <label class="switch">
                                                                            <input type="checkbox" checked="checked">
                                                                            <span class="control"></span>
                                                                        </label>
                                                                        <!-- End Switch -->
                                                                    </div>
                                                                    <div>Email me when someone comments onmy article
                                                                    </div>
                                                                </div>
                                                                <!-- End Form Group -->

                                                                <!-- Form Group -->
                                                                <div class="form-group mb-4 d-flex align-items-center">
                                                                    <div class="mr-3">
                                                                        <!-- Switch -->
                                                                        <label class="switch">
                                                                            <input type="checkbox" checked="checked">
                                                                            <span class="control"></span>
                                                                        </label>
                                                                        <!-- End Switch -->
                                                                    </div>
                                                                    <div>Email me when someone answers on my form</div>
                                                                </div>
                                                                <!-- End Form Group -->

                                                                <!-- Form Group -->
                                                                <div class="form-group mb-4 d-flex align-items-center">
                                                                    <div class="mr-3">
                                                                        <!-- Switch -->
                                                                        <label class="switch">
                                                                            <input type="checkbox">
                                                                            <span class="control"></span>
                                                                        </label>
                                                                        <!-- End Switch -->
                                                                    </div>
                                                                    <div>Invites me to co-own a moodboard</div>
                                                                </div>
                                                                <!-- End Form Group -->

                                                                <!-- Form Group -->
                                                                <div class="form-group mb-4 d-flex align-items-center">
                                                                    <div class="mr-3">
                                                                        <!-- Switch -->
                                                                        <label class="switch">
                                                                            <input type="checkbox" checked="checked">
                                                                            <span class="control"></span>
                                                                        </label>
                                                                        <!-- End Switch -->
                                                                    </div>
                                                                    <div>Receive an email summary of notifications
                                                                        instead of individual emails</div>
                                                                </div>
                                                                <!-- End Form Group -->

                                                                <!-- Form Group -->
                                                                <div class="form-group mb-20 d-flex align-items-center">
                                                                    <div class="mr-3">
                                                                        <!-- Switch -->
                                                                        <label class="switch">
                                                                            <input type="checkbox">
                                                                            <span class="control"></span>
                                                                        </label>
                                                                        <!-- End Switch -->
                                                                    </div>
                                                                    <div>Notifications about upcoming live events</div>
                                                                </div>
                                                                <!-- End Form Group -->


                                                            </div>
                                                            <!-- End Account Setting -->
                                                        </div>
                                                    </div>
                                                    <!-- End Card -->

                                                    <!-- Card -->
                                                    <div class="card mb-30">
                                                        <div class="card-body p-30">
                                                            <!-- Change Password -->
                                                            <div class="change-password">

                                                                <div>
                                                                    <h4 class="mb-4 pt-2">Change Password</h4>
                                                                </div>

                                                                <!-- Form Group -->
                                                                <div class="form-group mb-4">
                                                                    <label for="old-pass"
                                                                        class="bold font-14 mb-2 black">Old
                                                                        Password</label>
                                                                    <input type="password" class="theme-input-style"
                                                                        id="old-pass" placeholder="********">
                                                                </div>
                                                                <!-- End Form Group -->

                                                                <!-- Form Group -->
                                                                <div class="form-group mb-4">
                                                                    <label for="new-pass"
                                                                        class="bold font-14 mb-2 black">New
                                                                        Password</label>
                                                                    <input type="password" class="theme-input-style"
                                                                        id="new-pass" placeholder="********">
                                                                </div>
                                                                <!-- End Form Group -->

                                                                <!-- Form Group -->
                                                                <div class="form-group mb-10">
                                                                    <label for="retype-pass"
                                                                        class="bold font-14 mb-2 black">Retype
                                                                        Password</label>
                                                                    <input type="password" class="theme-input-style"
                                                                        id="retype-pass" placeholder="********">
                                                                </div>
                                                                <!-- End Form Group -->

                                                            </div>
                                                            <!-- End Change Password -->
                                                        </div>
                                                    </div>
                                                    <!-- End Card -->
                                                </div>

                                                <div class="col-12 text-center mb-3">
                                                    <!-- Button Group -->
                                                    <div class="button-group pt-1">
                                                        <button type="submit" class="btn btn-block">Save
                                                            Changes</button>
                                                    </div>
                                                    <!-- End Button Group -->
                                                </div>

                                                <div class="col-12 text-center">
                                                    <!-- Button Group -->
                                                    <div class="button-group pt-1">
                                                        <button type="reset"
                                                            class="link-btn bg-transparent mr-3 soft-pink">Cancel</button>
                                                    </div>
                                                    <!-- End Button Group -->
                                                </div>

                                            </div>
                                        </form>
                                        <!-- End Form -->
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>
                </div>


            </div>

        </div>




    </div>
</div>


@endsection
