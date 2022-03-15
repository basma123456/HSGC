<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarouselAttributeUpdateRequest extends FormRequest
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

            'carousel' => 'required|integer',


            'title' => 'required|string|max:120',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|min:120',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|min:120',

            'summary' => 'required|string',
            'text1' => 'nullable|string|max:170',
            'text2' => 'nullable|string|max:170',
            'text3' => 'nullable|string|max:170',

            'user_id' => 'required|integer'


        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('validation.required')  ,
            'title.string' => trans('validation.string')  ,
            'title.max:120' => trans('validation.max')  ,

            'image.image' => trans('validation.image')  ,
            'image.min:120' => trans('validation.min')  ,


            'image2.image' => trans('validation.image')  ,
            'image2.min:120' => trans('validation.min')  ,

            'summary.required' => trans('validation.required')  ,
            'summary.string' => trans('validation.string')  ,

            'text1.max:170' => trans('validation.max')  ,
            'text1.string' => trans('validation.string')  ,

            'text2.max:170' => trans('validation.max')  ,
            'text2.string' => trans('validation.string')  ,

            'text3.max:170' => trans('validation.max')  ,
            'text3.string' => trans('validation.string')  ,

            'user_id.required' => trans('validation.required')

        ];
    }
}
