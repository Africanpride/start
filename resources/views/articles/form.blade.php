<div
    class="mb-30 form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title" class="col-md-12 control-label">{{ trans('articles.title') }}</label>
    <div class="col-md-12">
        <input class="form-control" name="title" type="text" id="title"
            value="{{ old('title', optional($article)->title) }}" minlength="1"
            maxlength="255" placeholder="{{ trans('articles.title__placeholder') }}">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <textarea id="full-editor" class="mb-30 pb-20 col-md-9" name="content"  tinymce-editor></textarea> --}}

<textarea id="full-editor" name="content" rows="5" cols="40" class="form-control tinymce-editor mb-30 pb-20 col-md-9">{!! old('content', optional($article)->content) !!}</textarea>

