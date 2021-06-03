@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row h-100">
       <div class="col-12 h-100">
          <!-- Card -->
          <div class="card h-100">
             <div class="card-body">
                <!-- Add New Task -->
                <div class="task-details">
                   <!-- Todo Title -->
                   <h4 class="add-new-title style--two mt-1">For detracty charmed add talking age. Shy resolution instrument unreserved man few.</h4>
                   <!-- End Todo Title -->

                   <!-- Todo Actions -->
                   <div class="todo_actions d-flex align-items-center flex-wrap mb-2">
                      <!-- Todo Assaign -->
                      <div class="todo_assaign d-flex align-items-center">
                            <p class="label-text mb-0 mr-2">Assigned To</p>

                            <!-- Assign tag -->
                            <div class="assign-tag front-end">
                               <div class="tag-text font-12">Front-End</div>
                               <img src= "{{ asset('backend/assets/img/avatar/info-avatar.png')  }}" alt="" class="assign-avatar">
                            </div>
                            <div class="assign-tag back-end">
                               <div class="tag-text font-12">Back-End</div>
                               <img  src=" {{ asset('backend/assets/img/avatar/m3.png')  }}" alt="" class="assign-avatar">
                            </div>
                            <!-- End Assign tag -->
                      </div>
                      <!-- End Todo Assaign -->

                      <!-- Todo date -->
                      <div class="todo_date d-flex align-items-center">
                         <p class="label-text mb-0 mr-3">Date</p>
                        <span class="show-date"><img {{ asset('backend/assets/img/svg/calender.svg') }} " alt="" class="svg"> 28 October 2019</span>
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
                      <p class="label-text mb-2">Description</p>
                      <p>In consequat, quam id sodales hendrerit, eros mi molestie leo, nec lacinia risus neque tristique augue. Proin tempus urna vel congue elementum. Vestibulum euismod accumsan dui, ac iaculis sem viverra eu. Donec convallis, elit vitae ornare cursus, libero purus facilisis felis, a volutpat metus tortor bibendum elit. Integer nec mi eleifend, fermentum lorem vitae, finibus neque. Cras accumsan pretium dignissim. Curabitur a orci lorem. Phasellus tempor dolor vel odio efficitur, ac sollicitudin ipsum feugiat. Proin feugiat aliquet turpis, et rhoncus nibh elementum quis.</p>
                   </div>
                   <!-- End Description -->

                   <!-- Add Comment -->
                   <div class="add_comment pt-1 mb-4">
                      <p class="label-text mb-2"><span class="regular">Created By</span> &nbsp; Abrilay Khatun</p>
                      <p>Task creator's comment show here</p>
                   </div>
                   <!-- End Add Comment -->

                   <!-- Add Task Button -->
                   <div class="edit-task-btn pt-2 mb-3">
                      <a href="add-new.html" class="btn">Edit Tasks</a>
                   </div>
                   <!-- Add Task Button -->
                </div>
                <!-- End Add New Task -->
             </div>
          </div>
          <!-- End Card -->
       </div>
    </div>
 </div>
@endsection

