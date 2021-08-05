@extends('layouts.backend')

@section('content')

{{-- {{dd($service)}} --}}

<div class="container-fluid">
    <div class="row h-100">
        <div class="col-12 h-100">
            <!-- Card -->
            <div class="card h-100">
                <div class="card-body">
                    <!-- Add New Task -->
                    <div class="task-details">
                        <!-- Todo Title -->
                        <h4 class="add-new-title style--two mt-1">{{ $service->name ?? ' '}}</h4>
                        <!-- End Todo Title -->

                        <!-- Todo Actions -->
                        <div class="todo_actions d-flex align-items-center flex-wrap mb-2">
                            <!-- Todo Assaign -->
                            <div class="todo_assaign d-flex align-items-center">
                                <p class="label-text mb-0 mr-2">Assigned To</p>

                                <!-- Assign tag -->
                                <div class="assign-tag front-end">
                                    <div class="tag-text font-12">Front-End</div>
                                    <img src="{{ asset('backend/assets/img/avatar/info-avatar.png')  }}" alt=""
                                        class="assign-avatar">
                                </div>
                                <div class="assign-tag back-end">
                                    <div class="tag-text font-12">Back-End</div>
                                    <img src=" {{ asset('backend/assets/img/avatar/m3.png')  }}" alt=""
                                        class="assign-avatar">
                                </div>
                                <!-- End Assign tag -->
                            </div>
                            <!-- End Todo Assaign -->

                            <!-- Todo date -->
                            <div class="todo_date d-flex align-items-center">
                                <p class="label-text mb-0 mr-3">Date</p>
                                <span class="show-date"><img
                                        {{ asset('backend/assets/img/svg/calender.svg') }} " alt="" class=" svg"> 28
                                    October 2019</span>
                            </div>
                            <!-- End Todo date -->

                            <!-- Priority Lavel -->
                            <div class="todo_priority d-flex align-items-center">
                                <p class="label-text mb-0 mr-3">Priority Level</p>

                                <!-- Priority -->
                                <div class="priority">
                                    <p class="assign-menu bold font-14">Not Important</p>
                                </div>
                                <!-- End Priority -->
                            </div>
                            <!-- End Priority Lavel -->
                        </div>
                        <!-- End Todo Actions -->

                        <!-- Description -->
                        <div class="description mb-4">
                            <p class="label-text mb-2">{{ __('Service Description') }}</p>
                            <p>{!! $service->description !!}</p>
                        </div>

                        <!-- End Description -->

                        <!-- Add Comment -->
                        <div class="add_comment pt-1 mb-4">
                            {{-- <div class="label-text mb-2  d-flex align-items-center">
                                <span class="regular mr-10">Created By: </span>
                                <span class="mr-1">
                                    <img src="{{ '/backend/assets/img/avatar/'. $service->author->profile->avatar }}"
                                        alt="" class="assign-avatar rounded-circle avatar">
                                </span><span>{{ $service->author->fullName }}</span>
                            </div> --}}

                        </div>
                        <!-- End Add Comment -->

                        <div class="row">
                            <!-- Add Task Button -->
                            <div class="edit-task-btn pt-2 mb-3 col-xl-6 col-md-6  col-sm-12 col-xs-12">
                                <a href="{{ route('services.edit', $service->id )}}"
                                    class="btn btn-block">{{ __('Edit Service') }}
                                </a>
                            </div>
                            <div class="edit-task-btn pt-2 mb-3 col-xl-6 col-md-6  col-sm-12 col-xs-12">
                                <a href="{{ route('services.index' )}}"
                                    class="btn btn-block">{{ __('View All Services') }}
                                </a>
                            </div>
                            <!-- Add Task Button -->
                        </div>
                    </div>
                    <!-- End Add New Task -->
                </div>
            </div>
            <!-- End Card -->
        </div>
    </div>
</div>
@endsection
