<?php

namespace App\Http\Requests\Backend\Video;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('update-video');
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
            'video_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please insert Event Title',
            'title.max' => 'Event Title may not be greater than 191 characters.',
            'video_name.required' => 'Please insert Video',
        ];
    }
}
