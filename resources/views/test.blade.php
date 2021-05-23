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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="font-20 mb-3">Business/Organizational Description</h2>

                    {{ __("Bots are used by search engines such as Google and Bing to crawl web sites, moving from site to site, gathering information about those pages, and indexing them. Following that, algorithms evaluate pages in the index, taking into account hundreds of ranking variables or signals, to decide the order in which pages should appear in search results for a given query. Filling the following will give you a foothold in the SEO space helping your business meet it's target audience. ")}}

                </div>

            </div>


        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <!-- Touchspin -->
            <div class="form-element touchspin mb-30">
                <!-- Form -->
                <form method="POST" action="{{ route('test'), $business->id }}" id="testForm"
                     accept-charset="UTF-8" class="form-horizontal"  enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <!-- Form Group -->
                    <div class="form-group mb-4">
                        <label for="textarea1" class="font-16 bold black mb-10">Please provide a description of your business or organization here.</label>
                        <textarea id="textarea1" name="business_description" class="theme-input-style style--seven" placeholder="{{ __($business->business_description ?? 'Business/Organization description here.')}}"></textarea>

                    </div>
                    <!-- End Form Group -->

                    <div class="">
                        <!-- Base Horizontal Form With Icons -->
                        <div class="vertical-form mb-30">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Business/Organization Name</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <img src=" {{ asset('backend/assets/img/svg/user3.svg') }} " alt="" class="svg">
                                            </div>
                                        </div>

                                        <input type="text" name="business_name" class="form-control pl-1" placeholder="{{ __($business->business_name ?? 'Business/Organization Name here.')}}">
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Your Email (For official communications)</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <img src=" {{ asset('backend/assets/img/svg/mail3.svg') }} " alt="" class="svg">
                                            </div>
                                        </div>
                                        <input type="text" name="business_email" class="form-control pl-1" placeholder="{{ __($business->business_email ?? 'Business/Organization Official Email.')}}">
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="form-row mb-20">
                                    <label class="font-14 bold mb-2">Business/Organization Contact Number</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <img src=" {{ asset('backend/assets/img/svg/mobile3.svg') }} " alt="" class="svg">
                                            </div>
                                        </div>
                                        <input type="tel" name="business_number" class="form-control pl-1" placeholder="{{ __($business->business_number ?? 'Type your Business/Organization Contact Number.')}}">
                                    </div>
                                </div>
                                <!-- End Form Group -->

                                <!-- Form Group -->
                                <div class="form-row mb-20">
                                    <label class="font-14 bold mb-2">SEO Keywords</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <img src=" {{ asset('backend/assets/img/svg/globe-icon.svg') }} " alt="" class="svg">
                                            </div>
                                        </div>
                                        <input type="text" name="seo_keywords"  class="form-control pl-1" placeholder="keywords must be comma seperated. eg; Africa, business solutions, ">
                                    </div>
                                </div>
                                <!-- End Form Group -->




                                <!-- Form Group -->
                                <div class="form-row pt-30">
                                    <div class="col-12 text-left">
                                        <button type="submit" class="btn btn-block">Submit</button>
                                    </div>
                                </div>
                                <!-- End Form Group -->
                        </div>
                        <!-- End Horizontal Form With Icons -->
                    </div>

                </form>
                <!-- End Form -->
            </div>
            <!-- End Touchspin -->
        </div>
    </div>
</div>


@endsection
