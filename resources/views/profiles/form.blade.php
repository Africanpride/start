
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('profiles.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($profile)->name) }}" minlength="1" maxlength="255" placeholder="{{ trans('profiles.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('about') ? 'has-error' : '' }}">
    <label for="about" class="col-md-2 control-label">{{ trans('profiles.about') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="about" type="text" id="about" value="{{ old('about', optional($profile)->about) }}" minlength="1" placeholder="{{ trans('profiles.about__placeholder') }}">
        {!! $errors->first('about', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">{{ trans('profiles.user_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($profile)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('profiles.user_id__placeholder') }}</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($profile)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
    <label for="avatar" class="col-md-2 control-label">{{ trans('profiles.avatar') }}</label>
    <div class="col-md-10">
        <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                    Browse <input type="file" name="avatar" id="avatar" class="hidden">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" readonly>
        </div>

        @if (isset($profile->avatar) && !empty($profile->avatar))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_avatar" class="custom-delete-file" value="1" {{ old('custom_delete_avatar', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                    {{ $profile->avatar }}
                </span>
            </div>
        @endif
        {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

