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
            'file' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please insert Event Title',
            'title.max' => 'Event Title may not be greater than 191 characters.',
            'file.required' => 'Please insert Video',
        ];
    }
}
