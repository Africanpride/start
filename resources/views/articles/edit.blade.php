@extends('layouts.backend')

@section('content')



<div class="row">
    <div class="col-12">
        <div class="card mb-30">
            <div class="card-body py-30 pb-0">


                <div class="panel-heading clearfix">

                    <div class="pull-left">
                        <h4 class="mt-5 mb-5">{{ !empty($article->title) ? $article->title : 'Article' }}</h4>
                    </div>
                    <div class="btn-group mb-30 pull-right" role="group">

                        <a href="{{ route('articles.index') }}" class="btn btn-primary"
                            title="{{ trans('articles.show_all') }}">
                            <span class="bi-list-ul" aria-hidden="true"></span>
                        </a>

                        <a href="{{ route('articles.create') }}" class="btn btn-success"
                            title="{{ trans('articles.create') }}">
                            <span class="bi-plus-circle" aria-hidden="true"></span>
                        </a>

                    </div>
                </div>

                <div class="panel-body">

                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif





                    <form method="POST" action="{{ route('articles.update', $article->slug) }}" id="edit_article_form"
                        name="edit_article_form" accept-charset="UTF-8" class="form-horizontal"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">

                        @include ('articles.form', [
                        'article' => $article,
                        ])


                        <div class="form-group mt-20">
                            <div class="col-md-12">
                                <input class="btn btn-block btn-primary" type="submit"
                                    value="{{ trans('articles.update') }}">
                            </div>
                        </div>
                    </form>




                </div>
            </div>

        </div>
    </div>
</div>

@endsection
