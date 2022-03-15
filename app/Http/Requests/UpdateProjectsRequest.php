<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:120',
            'summary' => 'nullable|string',
            'client_id' => 'required|integer',
            'user_id' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|min:120',
            'status' => 'required|integer|max:1'

        ];
    }


    public function messages()
    {
        return [
            'title.required' => trans('validation.required')  ,
            'title.string' => trans('validation.required')  ,
            'title.max:120' => trans('validation.max')  ,


            'client_id.required' => trans('validation.required')  ,
            'user_id.required' => trans('validation.required')  ,
            'status.required' => trans('validation.required'),

            'summary.string' => trans('validation.string')  ,

            'image.image' => trans('validation.image')  ,
            'image.min:120' => trans('validation.min')  ,


        ];
    }
}
