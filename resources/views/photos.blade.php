@extends('layouts.backend')

@section('content')

    <form action="{{ url('photos.store', $profile->uuid ) }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <input type="file" class="custom-file-input" id="customFile" name="avatar">
    </div>
    <button type="submit">Submit</button>
</form>

@endsection
