@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row h-100">
       <div class="col-12 h-100">
          <!-- Card -->

          <div class="bg-c2-light profile-widget-header color-indigo ">
            <h4 class="add-new-title mt-1 d-flex align-items-center"><img src= "{{ asset('/backend/assets/img/svg/calender-color.svg') }}" alt="" class="svg mr-3">
           {{ __('Add New Service') }}</h4>
           </div>
          <div class="card h-100 ">
             <div class="card-body">

                <!-- Add New Service -->
                <form method="POST" action="{{ route('services.store')  }}" class="add-new_task" enctype="multipart/form-data">
                    @csrf

                   <!-- Service Name -->
                   <div class="add_task-name mb-40">
                      <label for="task_name" class="label-text">{{ __('Service Name') }}</label>
                      <input type="text" id="service_name" name="name" class="theme-input-style" placeholder="Type here" >
                   </div>
                   <!-- End Task Name -->

                   <!-- Todo Actions -->
                   <div class="todo_actions d-flex align-items-center flex-wrap">
                      {{-- <!-- Todo Assaign -->
                      <div class="todo_assaign d-flex align-items-center">
                            <p class="label-text mb-0 mr-2">Manager Assigned To</p>

                            <!-- Assign tag -->
                            <div class="assign-tag">
                               <div class="tag-text font-12">Front-End</div>
                               <img src=" {{ asset('/backend/assets/img/avatar/info-avatar.png')  }}" alt="" class="assign-avatar">
                            </div>
                            <!-- End Assign tag -->

                            <!-- Assigned To -->
                            <div class="assigned-to">
                               <a href="#" class="assign-btn ml-2" data-toggle="dropdown">
                                  <img src=" {{ asset('/backend/assets/img/svg/plus.svg')  }}" alt="" class="svg">
                               </a>
                               <div class="dropdown-menu style--four">
                                  <a href="#">Back End</a>
                                  <a href="#">Chaya Cline</a>
                                  <a href="#">Talia Guerrero</a>
                                  <a href="#">Oran Wilkins</a>
                                  <a href="#">Ryley Bryan</a>
                                  <a href="#" class="selected">Front-End</a>
                                  <a href="#">Eoin French</a>
                                  <a href="#">Wilson Norris</a>
                                  <a href="#">Kirstin Power</a>
                               </div>
                            </div>
                            <!-- End Assigned To -->
                      </div>
                      <!-- End Todo Assaign --> --}}

                      <!-- Todo date -->
                      <div class="todo_date d-flex align-items-center">
                         <p class="label-text mb-0 mr-3">Publish Date</p>

                         <!-- Date Picker -->
                         <div class="dashboard-date style--three">
                            <span class="input-group-addon">
                               <img src=" {{ asset('/backend/assets/img/svg/calender.svg')  }}" alt="" class="svg">
                            </span>

                            <input type="text" id="default-date" name="created_at" placeholder="{{ now()->toFormattedDateString() }}" value="{{ now() }}">
                         </div>
                         <!-- End Date Picker -->

                      </div>
                      <!-- End Todo date -->

                      <!-- Priority Lavel -->
                      <div class="todo_priority d-flex align-items-center">
                            <p class="label-text mb-0 mr-3">Service Category</p>

                            <!-- Priority -->
                            <div class="priority">
                               <a href="#" class="assign-menu bold font-14" data-toggle="dropdown">Not Important</a>
                               <div class="dropdown-menu style--five">
                                  <a href="#"><span class="tag_color urgent"></span>Urgent</a>
                                  <a href="#"><span class="tag_color important"></span>Important</a>
                                  <a href="#"><span class="tag_color not_important"></span>Not Important</a>
                                  <a href="#"><span class="tag_color not_urgent"></span>Not Urgent</a>
                                  <a href="#"><span class="tag_color average"></span>Average</a>
                               </div>
                            </div>
                            <!-- End Priority -->
                      </div>
                      <!-- End Priority Lavel -->
                   </div>
                   <!-- End Todo Actions -->

                   <!-- Add Description -->
                   <div class="add_description mb-4">
                      <label for="description" class="label-text">{{ __('Description')}}</label>
                      <textarea name="description" name="description" id="description" class="theme-input-style" placeholder="{{ __('Service Description Here ....')}}"></textarea>
                   </div>
                   <!-- End Add Description -->

                   <!-- Add Comment -->
                   <div class="add_comment pt-1 mb-4">
                      <label for="comment" class="label-text"><span class="regular">{{ __('Created By: ')}}</span> &nbsp; {{ Auth()->user()->full_name ?? ' '}}</label>
                      <textarea name="comment" id="comment" class="theme-input-style style--two" placeholder="Write your comment here"></textarea>
                   </div>



                   <div class="form-group mb-4">
                    <label for="id_label_multiple"  class="mb-2 black bold d-block">Select multiple Categlories</label>

                    <select class="form-control theme-input-style js-example-basic-multiple p-4" id="id_label_multiple" name="categories[]" multiple="true">

                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" class="p-1">{{$category->name}}</option>

                        @endforeach

                    </select>
                </div>

                   <!-- Add Task Button -->
                   <div class="add-task-btn pt-2 mb-3">
                      <button class="btn btn-block" type="submit">{{ __('Save Service')}}</button>
                   </div>
                   <!-- Add Task Button -->
                </form>
                <!-- End Add New Task -->
             </div>
          </div>
          <!-- End Card -->
       </div>
    </div>
 </div>
@endsection

