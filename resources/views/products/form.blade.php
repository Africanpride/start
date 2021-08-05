<div
    class="mb-30 form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-12 control-label">{{ trans('Name') }}</label>
    <div class="col-md-12">
        <input class="form-control" name="name" type="text" id="name"
            value="{{ old('name', optional($product)->name) }}" minlength="1"
            maxlength="255" placeholder="{{ trans('Product Name') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{-- <textarea id="full-editor" class="mb-30 pb-20 col-md-9" name="description"  tinymce-editor></textarea> --}}


<div class="textarea p-30">
    <textarea id="full-editor" name="description" rows="5" cols="40" class="full-editor form-control tinymce-editor mb-40 pb-40 col-md-9">{!! old('description', optional($product)->description) !!}</textarea>
</div>
{{-- <div class="textarea  p-30">
    <textarea name ="notes" id="textarea1"  rows="5" cols="400"  class="theme-input-style style--seven" placeholder="Type product Notes Notes Here">{!! old('notes', optional($product)->notes) !!}</textarea>
</div> --}}

{{-- @include ('products.image-upload') --}}


