@extends('layouts.backend')

@section('content')

dashboard

{!!'<br>' . Auth::user()->full_name !!}
<div class="media-body">
    <a href="#" class="btn s_alert bg-success-light text-success mr-3 mr-sm-4 mb-10" id="type-success">Success</a>
    <a href="#" class="btn s_alert bg-info-light text-info mr-3 mr-sm-4 mb-10" id="type-info">Info</a>
    <a href="#" class="btn s_alert bg-warning-light text-warning mr-3 mr-sm-4 mb-10" id="confirm-text">Warning</a>
    <a href="#" class="btn s_alert bg-danger-light text-danger mb-10" id="type-error">Error</a>
</div>

@endsection
