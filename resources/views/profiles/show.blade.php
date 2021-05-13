@extends('layouts.backend')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($profile->name) ? $profile->name : 'Profile' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('profiles.profile.destroy', $profile->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('profiles.profile.index') }}" class="btn btn-primary" title="{{ trans('profiles.show_all') }}">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('profiles.profile.create') }}" class="btn btn-success" title="{{ trans('profiles.create') }}">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('profiles.profile.edit', $profile->id ) }}" class="btn btn-primary" title="{{ trans('profiles.edit') }}">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('profiles.delete') }}" onclick="return confirm(&quot;{{ trans('profiles.confirm_delete') }}?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('profiles.name') }}</dt>
            <dd>{{ $profile->name }}</dd>
            <dt>{{ trans('profiles.about') }}</dt>
            <dd>{{ $profile->about }}</dd>
            <dt>{{ trans('profiles.user_id') }}</dt>
            <dd>{{ optional($profile->user)->admin }}</dd>
            <dt>{{ trans('profiles.avatar') }}</dt>
            <dd>{{ asset('storage/' . $profile->avatar) }}</dd>

        </dl>

    </div>
</div>

@endsection