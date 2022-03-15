<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|min:120',
            'summary' => 'nullable|string',
            'client_id' => 'required|integer',
            'status' => 'nullable|integer|max:1',
            'user_id' => 'required|integer'


        ];
    }


    public function messages()
    {
        return [
            'title.required' => trans('validation.required')  ,
            'title.string' => trans('validation.string')  ,
            'title.max:120' => trans('validation.max')  ,

            'image.required' => trans('validation.required')  ,
            'image.image' => trans('validation.image')  ,
            'image.min:120' => trans('validation.min')  ,

            'summary.string' => trans('validation.string')  ,
            'client_id.required' => trans('validation.required')  ,
//            'status.required' => trans('validation.required')  ,
            'user_id.required' => trans('validation.required')

        ];
    }

}
