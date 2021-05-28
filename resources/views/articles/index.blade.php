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
                        <h4 class="c1">{{ trans('articles.model_plural') }}</h4>
                    </div>

                    <form action="#" class="search-form col-7 col-xl-7 ">
                        <div class="theme-input-group">
                            <input type="text" class="theme-input-style" placeholder="Search Article">

                            <button type="submit"><img src="{{ asset('/backend/assets/img/svg/search-icon.svg') }}"
                                    alt="" class="svg"></button>
                        </div>
                    </form>

                    <!-- Main Header Button -->
                    <div class="main-header-btn ml-md-1">
                        <a href="{{ route('articles.create') }}" class="btn"> <img
                                src="{{ asset('backend/assets/img/svg/plus_white.svg') }}" alt="" class="svg mr-1">
                            Create Article</a>
                    </div>

                </div>

                @if(count($articles) == 0)
                <div class="panel-body text-center">
                    <h4>{{ trans('articles.none_available') }}</h4>
                </div>
                @else
                <div class="panel-body panel-body-with-table">
                    <div class="table-responsive">

                        <table class="table table-striped pb-60 pt-30">
                            <thead>
                                <tr>
                                    <th>{{ __('Articles') }}</th>
                                    {{-- <th>{{ trans('Author') }}</th> --}}


                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td>
                                        <a href="{{ route('articles.show', $article->slug ) }}" class=""
                                            title="{{ trans('articles.show') }}">
                                            <h4><b>{{ $article->title }} </b></h4>
                                        </a><br>
                                        {{ Str::limit( $article->content, 200, ' (...)')  }} <br>
                                        <span class="full-date mt-3 font-italic"> {{ ($article->created_at)->toRfc850String()  ?? 'Date'}}</span>
                                        <span class="full-date mt-3 font-italic"> <i class="icofont-labour"> </i>{{ trans('Author') }}: {{ optional($article->user)->full_name }}</span>
                                    </td>
                                    {{-- <td>{{ optional($article->user)->first_name }}</td> --}}

                                    <td class="align-middle">

                                        <form method="POST" action="{!! route('articles.destroy', $article->slug) !!}"
                                            accept-charset="UTF-8">
                                            <input name="_method" value="DELETE" type="hidden">
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a href="{{ route('articles.show', $article->slug ) }}"
                                                    class="btn btn-info" title="{{ trans('articles.show') }}">
                                                    <span class="bi-eye-fill" aria-hidden="true"></span> </a>
                                                <a href="{{ route('articles.edit', $article->slug ) }}"
                                                    class="btn btn-primary" title="{{ trans('articles.edit') }}">
                                                    <span class="bi-file-earmark-break" aria-hidden="true"></span>
                                                </a>

                                                <button type="submit" class="btn btn-danger"
                                                    title="{{ trans('articles.delete') }}"
                                                    onclick="return confirm(&quot;{{ trans('articles.confirm_delete') }}&quot;)">
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
                    {{ $articles->links() }}
                </div>

                @endif

            </div>
        </div>
    </div>
</div>

@endsection
