@extends('layouts.backend')

@section('content')
<div class="row">

    <div class="col-xl-8 col-12">
        <!-- Card -->

        <div class="card mb-30">
            <div class="profile-widget-header bg-primary-light">
                <h4 class="add-new-title mt-1 d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18"
                        class="svg mr-3 replaced-svg">
                        <g id="calender-color" transform="translate(1 1)">
                            <path id="Path_481" data-name="Path 481"
                                d="M6.389,6H19.611A1.766,1.766,0,0,1,21.5,7.61V18.876a1.766,1.766,0,0,1-1.889,1.61H6.389A1.766,1.766,0,0,1,4.5,18.876V7.61A1.766,1.766,0,0,1,6.389,6Z"
                                transform="translate(-4.5 -4.486)" fill="#e9e7ff" stroke="#8280fd"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="1"></path>
                            <path id="Path_482" data-name="Path 482" d="M24,3V6" transform="translate(-11.722 -3)"
                                fill="none" stroke="#8280fd" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"></path>
                            <path id="Path_483" data-name="Path 483" d="M12,3V6" transform="translate(-7.278 -3)"
                                fill="none" stroke="#8280fd" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"></path>
                            <path id="Path_484" data-name="Path 484" d="M4.5,15h17" transform="translate(-4.5 -8.2)"
                                fill="none" stroke="#8280fd" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"></path>
                        </g>
                    </svg>
                    {{ __('Website Analytics Data')}}
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <x-referer-chart />
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <x-browser-chart />
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
</div>

@endsection
