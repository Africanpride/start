@extends('layouts.backend')

@section('content')

@if(Session::has('success_message'))
<div class="alert alert-success">
    <span class="bi glyphicon-ok"></span>
    {!! session('success_message') !!}

    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>

</div>
@endif
<div class="container-fluid">
<div class="row">
    <div class="col-12 h-100">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <!-- Add New Product -->

                <div class="row">
                    <div class="col-xl-6 col-md-6 col-xs-12">
                        <div class="form-element py-30 vertical-form mb-30">
                            <h4 class="font-20 mb-30">Add New Category</h4>

                            <!-- Form -->
                            <form method="POST" action="{{ route('category.store'), $category->id ?? '' }}" id="category_form"
                                accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                @csrf
                                {{-- @include ('articles.image-upload') --}}
                                <div class="form-group">
                                    <label for="" class="font-14 bold mb-2">Category Image</label>
                                    <input type="file" name="image" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}" >

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
                                    <label class="font-14 bold mb-2">Category Description</label>

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
                        <div class="col-12 text-right">
                            <button type="submit" class="btn long btn-block">Add Category</button>
                        </div>
                    </div>
                    <!-- End Form Group -->
                    </form>
                    <!-- End Form -->
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-xs-12">
                <div class="form-element py-30 vertical-form mb-30">
                    @if($categories->count() > 0)

                        @foreach($categories as $category)
                            <ul>
                                <li>
                                    {{ $category->name }}
                                </li>
                            </ul>

                        @endforeach

                    @else

                        <h4 class="font-20 mb-30">No Category Added</h4>

                    @endif
                </div>
            </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>
</div>
<hr>

<div class="container-fluid">
<!-- Card -->
<div class="card">
    <!-- Product Details -->
    <div class="product-details pb-0">
        <div class="row">
            <div class="col-lg-4">
                <div class="pd-img-wrapp position-relative mb-5 mb-lg-0">

                    <img id="img_01"
                        src=" {{ asset('/backend/assets/img/product/product-details.jpg') }} "
                        data-zoom-image="{{ asset('backend/assets/img/product/product-details-large.jpg') }} "
                        alt="" />

                    <div id="gal1">
                        <a href="#"
                            data-image="{{ asset('backend/assets/img/product/product-details.jpg') }} "
                            data-zoom-image="{{ asset('backend/assets/img/product/product-details-large.jpg') }} ">
                            <img id="img_02"
                                src=" {{ asset('/backend/assets/img/product/product-details.jpg') }} "
                                alt="" />
                        </a>

                        <a href="#"
                            data-image="{{ asset('backend/assets/img/product/product-details-2.jpg') }} "
                            data-zoom-image="{{ asset('backend/assets/img/product/product-details-2-large.jpg') }} ">
                            <img id="img_03"
                                src=" {{ asset('/backend/assets/img/product/product-details-2.jpg') }} "
                                alt="" />
                        </a>

                        <a href="#"
                            data-image="{{ asset('backend/assets/img/product/product-details-3.jpg') }} "
                            data-zoom-image="{{ asset('backend/assets/img/product/product-details-3-large.jpg') }} ">
                            <img id="img_04"
                                src=" {{ asset('/backend/assets/img/product/product-details-3.jpg') }} "
                                alt="" />
                        </a>
                    </div>

                </div>
            </div>

            <div class="col-lg-8">
                <!-- Product Details Content -->
                <div class="product-details-content position-relative">
                    <!-- Product Title -->
                    <h4 class="product_title">
                        {{ $product->name ?? ' Product Name ' }}</h4>
                    <!-- End Product Title -->

                    <!-- Product Price -->
                    @if(App\Models\Product::all()->count() > 0)
                        <p class="price">
                            <span class="woocommerce-Price-amount amount"><span
                                    class="woocommerce-Price-currencySymbol">{{ $product->price_symbol ?? '$' }}
                                </span>{{ $product->specifications()->price ?? '100.00' }}</span>
                        </p>
                    @else
                        <p class="price">
                            <span class="woocommerce-Price-amount amount"><span
                                    class="woocommerce-Price-currencySymbol">{{ __('$') }}
                                </span>{{ __('100.00') }}</span>
                        </p>
                    @endif
                    <!-- End Product Price -->

                    <!-- Color Group -->
                    <div class="color-group d-flex align-items-center">
                        <span class="list-heading bold">Color</span>
                        <ul class="mb-0 list-inline">
                            <li><a href="#" class="color color1"><span></span></a></li>
                            <li><a href="#" class="color color2"><span></span></a></li>
                            <li><a href="#" class="color color3 active"><span></span></a></li>
                            <li><a href="#" class="color color4"><span></span></a></li>
                        </ul>
                    </div>
                    <!-- End Color Group -->

                    <!-- Product Review -->
                    <div class="product-review d-flex align-items-center">
                        <span class="list-heading bold">Rating</span>
                        <!-- Rating -->
                        <div class="star-rating">
                            <a href="#"><img
                                    src=" {{ asset('/backend/assets/img/svg/star.svg') }} "" alt="" class="
                                    svg"></a>
                            <a href="#"><img
                                    src=" {{ asset('/backend/assets/img/svg/star.svg') }} "" alt="" class="
                                    svg"></a>
                            <a href="#"><img
                                    src=" {{ asset('/backend/assets/img/svg/star.svg') }} "" alt="" class="
                                    svg"></a>
                            <a href="#"><img
                                    src=" {{ asset('/backend/assets/img/svg/star2.svg') }} "" alt="" class="
                                    svg"></a>
                            <a href="#"><img
                                    src=" {{ asset('/backend/assets/img/svg/star2.svg') }} "" alt="" class="
                                    svg"></a>
                        </div>
                        <!-- End Product Rating -->
                    </div>
                    <!-- End Product Review -->

                    <!-- Add to Cart Button -->
                    <button type="submit" class="single_add_to_cart_button button btn btn-fill">Add To Cart</button>
                    <!-- End Add to Cart Button -->

                    <!-- Product Description -->
                    <div class="woocommerce-product-details__short-description">
                        <h5>{{ __('Product Description') }}</h5>
                        <p>{{ $product->description ?? ' Product Description Here' }}
                        </p>
                    </div>
                    <!-- End Product Description -->
                </div>
                <!-- End Product Details Content -->
            </div>
        </div>




        <!-- Product Grid -->
        <div class="product-grid pt-5">
            <div class="row">
                <div class="col-12">
                    <h4 class="font-20 mb-4">Related Products</h4>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                    <!-- Product Grid Item -->
                    <div class="product-grid-item mb-30">
                        <div class="product-img mb-3">
                            <a href="product-details.html">
                                <img src=" {{ asset('/backend/assets/img/product/pg1.png') }}"
                                    class="w-100" alt="">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="mb-10">$24</h6>
                            <a href="product-details.html">
                                <p class="black">3pc Outdoor Set - Grey/Grey</p>
                            </a>
                        </div>
                    </div>
                    <!-- End Product Grid Item -->
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                    <!-- Product Grid Item -->
                    <div class="product-grid-item mb-30">
                        <div class="product-img mb-3">
                            <a href="product-details.html">
                                <img src=" {{ asset('/backend/assets/img/product/pg2.png') }}"
                                    class="w-100" alt="">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="mb-10">$24</h6>
                            <a href="product-details.html">
                                <p class="black">Left Arm Patio Loveseat</p>
                            </a>
                        </div>
                    </div>
                    <!-- End Product Grid Item -->
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                    <!-- Product Grid Item -->
                    <div class="product-grid-item mb-30">
                        <div class="product-img mb-3">
                            <a href="product-details.html">
                                <img src=" {{ asset('/backend/assets/img/product/pg3.png') }}"
                                    class="w-100" alt="">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="mb-10">$24</h6>
                            <a href="product-details.html">
                                <p class="black">Felton Tufted Sofa - Gray</p>
                            </a>
                        </div>
                    </div>
                    <!-- End Product Grid Item -->
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                    <!-- Product Grid Item -->
                    <div class="product-grid-item mb-30">
                        <div class="product-img mb-3">
                            <a href="product-details.html">
                                <img src=" {{ asset('/backend/assets/img/product/pg4.png') }}"
                                    class="w-100" alt="">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="mb-10">$24</h6>
                            <a href="product-details.html">
                                <p class="black">Trellis Elevated Fretwork </p>
                            </a>
                        </div>
                    </div>
                    <!-- End Product Grid Item -->
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                    <!-- Product Grid Item -->
                    <div class="product-grid-item mb-30">
                        <div class="product-img mb-3">
                            <a href="product-details.html">
                                <img src=" {{ asset('/backend/assets/img/product/pg5.png') }}"
                                    class="w-100" alt="">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="mb-10">$24</h6>
                            <a href="product-details.html">
                                <p class="black">Valencia Area Rug</p>
                            </a>
                        </div>
                    </div>
                    <!-- End Product Grid Item -->
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12">
                    <!-- Product Grid Item -->
                    <div class="product-grid-item mb-30">
                        <div class="product-img mb-3">
                            <a href="product-details.html">
                                <img src=" {{ asset('/backend/assets/img/product/pg6.png') }}"
                                    class="w-100" alt="">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="mb-10">$24</h6>
                            <a href="product-details.html">
                                <p class="black">Sullivan Swivel Glider Chair</p>
                            </a>
                        </div>
                    </div>
                    <!-- End Product Grid Item -->
                </div>
            </div>
        </div>
        <!-- End Product Grid -->
    </div>
    <!-- End Product Details -->
</div>
<!-- End Card -->

</div>

<hr>
@endsection
