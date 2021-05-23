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


<div class="textarea p-30">
    <textarea id="full-editor" name="content" rows="5" cols="40" class="form-control tinymce-editor mb-40 pb-40 col-md-9">{!! old('content', optional($article)->content) !!}</textarea>
</div>
<div class="textarea  p-30">
    <textarea name ="notes" id="textarea1" class="theme-input-style style--seven" placeholder="Type Article Notes Notes Here">{!! old('notes', optional($article)->notes) !!}</textarea>
</div>
{{-- <div class="col-12 file-repeater mt-3">
    <div data-repeater-list="images">
        <div data-repeater-item>
            <div class="row mb-20">
                <div class="col-9 col-lg-8">
                    <!-- <input type="file"> -->
                    <div class="attach-file style--three">
                        <div class="upload-button">
                            Add a Featured Image
                            <input class="file-input" type="file" name="image" value="{{ old('image') }}">
                        </div>
                    </div>
                    <label class="file_upload ml-2">No file added</label>
                </div>
                <div class="col-3 col-lg-4 text-lg-right">
                    <!-- Repeater Remove Btn -->
                    <button data-repeater-delete class="remove-btn style--two">
                        <img src=" {{ asset('backend/assets/img/svg/remove.svg') }} " alt="" class="svg">
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-2">
      <!-- Repeater Add Btn -->
        <button data-repeater-create type="button" class="repeater-add-btn btn-circle position-relative">
            <img src=" {{ asset('backend/assets/img/svg/plus_white.svg') }} " alt="" class="svg">
        </button>
        <span class="bold c2 ml-1">Add New</span>
    </div>
</div> --}}

@include ('articles.image-upload')


