@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <div class="card pb-2">
        <div class="p-4">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 mb-40">
                    <span>
                        {{-- <h4 class="mb-3">Available Product services</h4> --}}
                    </span>
                    <span>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            Add Product service
                        </button>
                    </span>
                    <span>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#manageservice">
                            Edit Product service
                        </button>

                    </span>
                    <hr>
                    @if($services->count() > 0 )

                        @foreach($services as $service)
                            <span class="list-unstyled mb-4">
                                <span class="event">
                                    {{-- <i class="icofont-check"></i> --}}

                                <!-- Button trigger modal -->
                                    <span class="badge badge-primary">
                                        <a href="" data-toggle="modal" data-target="#manageserviceCrud{{ $service->id }}" class=" text-info ">
                                            {{ $service->name }}
                                        </a>
                                    </span>

                                </span>
                            </span>
                            <div class="modal fade" id="manageserviceCrud{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">Edit service:  {{ $service->name }} </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-xs-12">
                                                    <div class="form-element py-10 vertical-form mb-50">

                <!-- Form -->
                <form method="POST" action="{{ route('service.update', $service->id ) }}" id="testForm"
                    accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="">
                        <!-- Base Horizontal Form With Icons -->
                        <div class="vertical-form">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="font-14 bold mb-2">{{ __('service Name')}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class=" color-grey icofont-ui-reply"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="name" class="form-control pl-1"
                                        placeholder="{{ __($service->name ?? 'Product service Name.')}}"
                                        value="{{ old('name', optional($service)->name) }}">
                                </div>
                            </div>
                            <!-- End Form Group -->
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="font-14 bold mb-2">{{ __('service Name')}}</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class=" color-grey icofont-ui-browser"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="description" class="form-control pl-1"
                                        placeholder="{{ __($service->description ?? 'Product service Description.')}}"
                                        value="{{ old('description', optional($service)->description) }}">
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-row pt-30">
                                <div class="col-12 text-left">
                                    <button type="submit" class="btn btn-block">{{__('Update service')}}</button>
                                </div>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <!-- End Horizontal Form With Icons -->
                    </div>

                </form>
                <!-- Form -->
                <form method="POST" action="{{ route('service.destroy', ['service' => $service->id] ) }}" id="serviceDelete"
                    accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="">
                        <!-- Base Horizontal Form With Icons -->
                        <div class="vertical-form">


                            <!-- Form Group -->
                            <div class="form-row pt-30">
                                <div class="col-12 text-left">
                                    <button type="submit" class="btn btn-block">{{__('Delete service')}}</button>
                                </div>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <!-- End Horizontal Form With Icons -->
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

                        @endforeach

                    @else

                        <h2>No Product service Added Yet</h2>

                    @endif

                </div>
                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 mb-40 ">

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLongTitle">Create Product service</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-xs-12">
                                            <div class="form-element py-10 vertical-form mb-50">

                                                <!-- Form -->
                                                <form method="POST"
                                                    action="{{ route('service.store') }}"
                                                    id="service_form" accept-charset="UTF-8" class="form-horizontal"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- @include ('articles.image-upload') --}}
                                                    <div class="form-group">
                                                        <label for="" class="font-14 bold mb-2">service Image</label>
                                                        <input type="file" name="image"
                                                            class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}">

                                                    </div>


                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">service Name</label>

                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="{{ asset('backend/assets/img/svg/user3.svg') }} "
                                                                        alt="" class="svg">
                                                                </div>
                                                            </div>

                                                            <input type="text" name="name" class="form-control pl-1"
                                                                placeholder="Type service Name">
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">{{ __('service Description')}}</label>

                                                        <div class="input-group">
                                                            {{-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="{{ asset('backend/assets/img/svg/mail3.svg') }}
                                                            " alt="" class="svg">
                                                        </div>
                                                    </div> --}}
                                                    <textarea name="description" class="form-control pl-1" rows="4"
                                                        placeholder="Type in service Description"></textarea>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->


                                        <!-- Form Group -->
                                        <div class="form-row">

                                            <div class="col-6">
                                                <button type="button" class="btn btn-primary btn-block"
                                                    data-dismiss="modal">Close</button>

                                            </div>
                                            <div class="col-6">
                                                <button type="submit" class="btn btn-block">Add service</button>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->
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

<div class="modal fade" id="manageservice" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Manage Product service</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xl-12 col-md-12 col-xs-12">
                        <div class="form-element py-10 vertical-form mb-50">

                            @if($services->count() > 0 )
                            <ul class="list-group">
                            @foreach($services as $service)
                                <!-- Message Item List -->
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                     <span>
                                        <div class="delete_mail">
                                            <form method="POST" action="{{ route('service.destroy',$service->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit"><img src="{{ asset('backend/assets/img/svg/delete.svg') }}" alt="" class="svg"></button>
                                            </form>

                                        </div>
                                    </span>
                                      <span>{{ $service->name }}</span>
                                      <span class="badge badge-primary badge-pill">{{ $service->products->count() }}</span>
                                    </li>
                                <!-- End Message Item List -->
                            @endforeach
                        </ul>
                        @else

                            <h2>No Product service Added Yet</h2>

                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>






        @endsection
