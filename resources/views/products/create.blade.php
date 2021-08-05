@extends('layouts.backend')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body py-30 pb-0">


                <div class="container-fluid d-flex justify-content-between mb-3 align-items-center">

                    <div class="pull-left">
                        <h4 class="c1">{{ trans('Create New product') }}</h4>
                    </div>


                    <!-- Main Header Button -->
                    <div class="main-header-btn ml-md-1">
                        <a href="{{ route('products.index') }}" class="btn">{{__(' Product List')}}</a>
                    </div>

                </div>

                    <div class="panel-body">

                        @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('products.store') }}"
                            accept-charset="UTF-8" id="create_article_form" name="create_article_form"
                            class="form-horizontal"  enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include('products.form', [
                            'product' => null,
                            ])

                            <div class="form-group mt-20">
                                <div class="col-md-12">
                                    <input class="btn btn-block" type="submit"
                                        value="{{ trans('Save Product') }}">
                                </div>
                            </div>

                        </form>

                    </div>

            </div>
        </div>
    </div>
</div>

@endsection
