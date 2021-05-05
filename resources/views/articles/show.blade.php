@extends('layouts.backend')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($article->title) ? $article->title : 'Article' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('articles.destroy', $article->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group mb-30" role="group">
                    <a href="{{ route('articles.index') }}" class="btn btn-primary" title="{{ trans('articles.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('articles.create') }}" class="btn btn-success" title="{{ trans('articles.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('articles.edit', $article->id ) }}" class="btn btn-primary" title="{{ trans('articles.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('articles.delete') }}" onclick="return confirm(&quot;{{ trans('articles.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('articles.title') }}</dt>
            <dd>{{ $article->title }}</dd>
            <dt>{{ trans('articles.slug') }}</dt>
            <dd>{{ $article->slug }}</dd>
            <dt>{{ trans('articles.content') }}</dt>
            <dd>{{ $article->content }}</dd>
            <dt>{{ trans('articles.notes') }}</dt>
            <dd>{{ $article->notes }}</dd>
            <dt>{{ trans('articles.created_by') }}</dt>
            <dd>{{ optional($article->creator)->name }}</dd>
            <dt>{{ trans('articles.body') }}</dt>
            <dd>{{ $article->body }}</dd>
            <dt>{{ trans('articles.image') }}</dt>
            <dd>{{ $article->image }}</dd>
            <dt>{{ trans('articles.active') }}</dt>
            <dd>{{ $article->active }}</dd>
            <dt>{{ trans('articles.featured') }}</dt>
            <dd>{{ $article->featured }}</dd>

        </dl>

    </div>
</div>

@endsection
