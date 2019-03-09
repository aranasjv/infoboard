<?php

namespace App\Http\Requests\Backend\Video;

use Illuminate\Foundation\Http\FormRequest;

class StoreVideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-video');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:191',
            'video_name' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100000',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please insert Video Title',
            'title.max' => 'Video Title may not be greater than 191 characters.',
            'video_name.required' => 'Please insert Video',
            'video_name.max' => 'Video has a limit of 100mb per upload',
            'video_name.mimes' => 'Video file type is unsupported',
        ];
    }
}
