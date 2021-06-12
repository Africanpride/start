@extends('layouts.backend')

@section('content')
<div class="container-fluid">
    <div class="row h-100">
       <div class="col-12 h-100">
          <!-- Card -->
          <div class="card h-100">
             <div class="card-body">
                <!-- Add New Service -->
                @foreach ($services as $service)

                <ul>
                    <li>
                        {{ $service->name }} <br>
                            @foreach ($service->categories as $category)
                                {{ $category->name}},
                            @endforeach
                    </li>
                </ul>

                @endforeach


                <!-- End Add New Service -->
             </div>
          </div>
          <!-- End Card -->
       </div>
    </div>
 </div>
@endsection

