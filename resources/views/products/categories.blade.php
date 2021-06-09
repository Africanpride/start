@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <div class="card pb-2">
        <div class="p-4">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 mb-40">
                    <span>
                        {{-- <h4 class="mb-3">Available Product Categories</h4> --}}
                    </span>
                    <span>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            Add Product Category
                        </button>
                    </span>
                    <span>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#manageCategory">
                            Edit Product Category
                        </button>

                    </span>
                    <hr>
                    @if($categories->count() > 0 )

                        @foreach($categories as $category)
                            <span class="list-unstyled mb-4">
                                <span class="event">
                                    {{-- <i class="icofont-check"></i> --}}

                                <!-- Button trigger modal -->
                                    <span class="badge badge-primary">
                                        <a href="" data-toggle="modal" data-target="#manageCategoryCrud{{ $category->id }}" class=" text-info ">
                                            {{ $category->name }}
                                        </a>
                                    </span>

                                </span>
                            </span>
                            <div class="modal fade" id="manageCategoryCrud{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">Edit Category:  {{ $category->name }} </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-xs-12">
                                                    <div class="form-element py-10 vertical-form mb-50">

                <!-- Form -->
                <form method="POST" action="{{ route('category.update', $category->id ) }}" id="testForm"
                    accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="">
                        <!-- Base Horizontal Form With Icons -->
                        <div class="vertical-form">
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="font-14 bold mb-2">{{ __('Category Name')}}</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class=" color-grey icofont-ui-reply"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="name" class="form-control pl-1"
                                        placeholder="{{ __($Category->name ?? 'Product Category Name.')}}"
                                        value="{{ old('name', optional($category)->name) }}">
                                </div>
                            </div>
                            <!-- End Form Group -->
                            <!-- Form Group -->
                            <div class="form-group">
                                <label class="font-14 bold mb-2">{{ __('Category Name')}}</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class=" color-grey icofont-ui-browser"></i>
                                        </div>
                                    </div>
                                    <input type="text" name="description" class="form-control pl-1"
                                        placeholder="{{ __($Category->description ?? 'Product Category Description.')}}"
                                        value="{{ old('description', optional($category)->description) }}">
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="form-row pt-30">
                                <div class="col-12 text-left">
                                    <button type="submit" class="btn btn-block">{{__('Update Category')}}</button>
                                </div>
                            </div>
                            <!-- End Form Group -->
                        </div>
                        <!-- End Horizontal Form With Icons -->
                    </div>

                </form>
                <!-- Form -->
                <form method="POST" action="{{ route('category.destroy', ['category' => $category->id] ) }}" id="categoryDelete"
                    accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="">
                        <!-- Base Horizontal Form With Icons -->
                        <div class="vertical-form">


                            <!-- Form Group -->
                            <div class="form-row pt-30">
                                <div class="col-12 text-left">
                                    <button type="submit" class="btn btn-block">{{__('Delete Category')}}</button>
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

                        <h2>No Product Category Added Yet</h2>

                    @endif

                </div>
                <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12 mb-40 ">

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLongTitle">Create Product Category</h4>
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
                                                    action="{{ route('category.store') }}"
                                                    id="category_form" accept-charset="UTF-8" class="form-horizontal"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- @include ('articles.image-upload') --}}
                                                    <div class="form-group">
                                                        <label for="" class="font-14 bold mb-2">Category Image</label>
                                                        <input type="file" name="image"
                                                            class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}">

                                                    </div>


                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">Category Name</label>

                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <img src="{{ asset('backend/assets/img/svg/user3.svg') }} "
                                                                        alt="" class="svg">
                                                                </div>
                                                            </div>

                                                            <input type="text" name="name" class="form-control pl-1"
                                                                placeholder="Type Category Name">
                                                        </div>
                                                    </div>
                                                    <!-- End Form Group -->

                                                    <!-- Form Group -->
                                                    <div class="form-group">
                                                        <label class="font-14 bold mb-2">{{ __('Category Description')}}</label>

                                                        <div class="input-group">
                                                            {{-- <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <img src="{{ asset('backend/assets/img/svg/mail3.svg') }}
                                                            " alt="" class="svg">
                                                        </div>
                                                    </div> --}}
                                                    <textarea name="description" class="form-control pl-1" rows="4"
                                                        placeholder="Type in category Description"></textarea>
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
                                                <button type="submit" class="btn btn-block">Add Category</button>
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

<div class="modal fade" id="manageCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">Manage Product Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xl-12 col-md-12 col-xs-12">
                        <div class="form-element py-10 vertical-form mb-50">

                            @if($categories->count() > 0 )
                            <ul class="list-group">
                            @foreach($categories as $category)
                                <!-- Message Item List -->
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                     <span>
                                        <div class="delete_mail">
                                            <form method="POST" action="{{ route('category.destroy',$category->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit"><img src="{{ asset('backend/assets/img/svg/delete.svg') }}" alt="" class="svg"></button>
                                            </form>

                                        </div>
                                    </span>
                                      <span>{{ $category->name }}</span>
                                      <span class="badge badge-primary badge-pill">{{ $category->products->count() }}</span>
                                    </li>
                                <!-- End Message Item List -->
                            @endforeach
                        </ul>
                        @else

                            <h2>No Product Category Added Yet</h2>

                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>






        @endsection
