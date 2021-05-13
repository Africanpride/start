<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ProfilesFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'string|min:1|max:255|nullable',
            'about' => 'string|min:1|nullable',
            'user_id' => 'nullable',
            'avatar' => ['file','nullable'],
        ];

        return $rules;
    }
    
    /**
     * Get the request's data from the request.
     *
     * 
     * @return array
     */
    public function getData()
    {
        $data = $this->only(['name', 'about', 'user_id']);
        if ($this->has('custom_delete_avatar')) {
            $data['avatar'] = null;
        }
        if ($this->hasFile('avatar')) {
            $data['avatar'] = $this->moveFile($this->file('avatar'));
        }

        return $data;
    }
  
    /**
     * Moves the attached file to the server.
     *
     * @param Symfony\Component\HttpFoundation\File\UploadedFile $file
     *
     * @return string
     */
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }
        
<<<<<<< HEAD
        $path = config('codegenerator.files_upload_path', 'uploads');
=======
        $path = config('laravel-code-generator.files_upload_path', 'uploads');
>>>>>>> v2.3
        $saved = $file->store('public/' . $path, config('filesystems.default'));

        return substr($saved, 7);
    }
}