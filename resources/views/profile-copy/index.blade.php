@extends('layouts.backend')

@section('content')

<div class="mt-30">
    <div class="row">
        <div class="col-xl-2 col-lg-4 col-sm-6">
            <!-- Card -->
            <div class="card mb-30">
                <div class="statistics-bounce-rate d-flex align-items-center justify-content-between">
                    <div class="state-content">
                        <p class="font-14 mb-2">{{ $user->first_name}}'s Profit</p>
                        <h3>&#36;25k</h3>
                    </div>
                    <div class="state-icon">
                        <img src="{{ asset('backend/assets/img/png-icon/bar.png') }}" alt="">
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-xl-2 col-lg-4 col-sm-6">
            <!-- Card -->
            <div class="card mb-30">
                <div class="statistics-bounce-rate order style--two d-flex align-items-center justify-content-between">
                    <div class="state-content">
                        <p class="font-14 mb-2">Orders</p>
                        <h3>568</h3>
                    </div>
                    <div class="state-icon">
                        <img src="{{ asset('backend/assets/img/png-icon/badge.png') }}" alt="">
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-xl-2 col-lg-4 col-sm-6">
            <!-- Card -->
            <div class="card mb-30">
                <div class="statistics-bounce-rate report d-flex align-items-center justify-content-between">
                    <div class="state-content">
                        <p class="font-14 mb-2">Issue Reports</p>
                        <h3>165</h3>
                    </div>
                    <div class="state-icon">
                        <img src="{{ asset('backend/assets/img/png-icon/report.png') }}" alt="">
                    </div>
                </div>
            </div>
            <!-- End Card -->
        </div>

        <div class="col-xl-2 col-lg-4 col-sm-6">
            <!-- Card -->
            <div class="card mb-30">
                <div class="statistics-bounce-rate support d-flex align-items-center justify-content-between">
                    <div class="state-content">
                        <p class="font-14 mb-2">Customer Support</p>
                        <h3>354</h3>
                    </div>
                    <div class="state-icon">
                        <img src="{{ asset('backend/assets/img/png-icon/what.png') }}" alt="">
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
                            <circle transform="rotate(-90, 100, 100)" class="ProgressBar-background" cx="100" cy="100" r="85" />
                            <circle transform="rotate(-90, 100, 100)" class="ProgressBar-circle" cx="100" cy="100" r="85" />
                        </svg>

                        <span class="ProgressBar-percentage ProgressBar-percentage--count"></span>
                        </div>
                    </div>
                </div>
                <!-- End Progress -->

                <div class="">
                    <h4 class="white font-20 mb-1">Project Deadline</h4>
                    <p>Vestibulum blandit viverra convallis. Pellentesque ligula urnafermentum ut semper intincidunt nec.</p>
                </div>
            </div>
        </div>


    </div>

</div>


@endsection
