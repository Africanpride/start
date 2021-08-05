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

<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body py-30 pb-0">

                <div class="container-fluid  d-flex justify-content-between mb-3 align-items-center">

                    <div class="pull-left">
                        <h4 class="c1">{{ trans('Products') }}</h4>
                    </div>

                    <form action="#" class="search-form col-7 col-xl-7 ">
                        <div class="theme-input-group">
                            <input type="text" class="theme-input-style" placeholder="Search product">

                            <button type="submit"><img src="{{ asset('/backend/assets/img/svg/search-icon.svg') }}"
                                    alt="" class="svg"></button>
                        </div>
                    </form>

                    <!-- Main Header Button -->
                    <div class="main-header-btn ml-md-1">
                        <a href="{{ route('products.create') }}" class="btn"> <img
                                src="{{ asset('backend/assets/img/svg/plus_white.svg') }}" alt="" class="svg mr-1">
                            {{ trans('Create Product') }}</a>
                    </div>

                </div>

                @if(count($products) == 0)
                <div class="panel-body text-center">
                    <h4>{{ trans('products.none_available') }}</h4>
                </div>
                @else
                <div class="panel-body panel-body-with-table">
                    <div class="table-responsive">

                        <table class="table table-striped pb-60 pt-60 mt-40">
                            <thead>
                                <tr>
                                    <th>{{ __('Featured Image') }}</th>
                                    {{-- <th>{{ trans('Author') }}</th> --}}


                                    <th>{{ __('Product Details') }}</th>
                                    <th>{{ __('Manage Product') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)


                                <tr>
                                    <td>
                                        <div class="img-70">

                                            <img src="{{ $product->getFirstMediaUrl('featured', 'old-picture')}}" alt="{{$product->name}}">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('products.show', $product->slug ) }}" class=""
                                            title="{{ trans('products.show') }}">
                                            <h4><b>{{ $product->name }} </b></h4>
                                        </a><br>
                                        {{ Str::limit( $product->description, 250, ' ....')  }} <br>
                                        <span class="full-date mt-3 font-italic">
                                            {{ ($product->created_at)->toRfc850String()  ?? 'Date'}}</span>
                                        <span class="full-date mt-3 font-italic"> <i class="icofont-labour">
                                            </i>{{ trans('Author') }}: {{ optional($product->user)->full_name }}</span>
                                    </td>
                                    {{-- <td>{{ optional($product->user)->first_name }}</td> --}}

                                    <td class="align-middle">

                                        <form method="POST" action="{!! route('products.destroy', $product->slug) !!}"
                                            accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('products.show', $product->slug ) }}"
                                                    class="btn btn-info" title="{{ trans('products.show') }}">
                                                    <span class="bi-eye-fill" aria-hidden="true"></span> </a>
                                                <a href="{{ route('products.edit', $product->slug ) }}"
                                                    class="btn btn-primary" title="{{ trans('products.edit') }}">
                                                    <span class="bi-file-earmark-break" aria-hidden="true"></span>
                                                </a>
                                                <button id="confirm-text2" type="submit" class="btn btn-danger z" title="{{ trans('products.delete') }}"
                                                onclick="return confirm(&quot;Delete {{ $product->name }}?&quot;)">
                                                <span class="bi-trash" aria-hidden="true"></span>
                                            </button>



                                            </div>

                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="panel-footer">
                    {{-- {{ $products->links() }} --}}
                </div>

                @endif

            </div>
        </div>
    </div>
</div>

@endsection
