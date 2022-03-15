<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarouselAttributeRequest extends FormRequest
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

            'carousel' => 'required',


            'title' => 'required|string|max:110',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|min:120',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|min:120',

            'summary' => 'required|string',
            'text1' => 'nullable|string|max:170',
            'text2' => 'nullable|string|max:170',
            'text3' => 'nullable|string|max:170',

            'user_id' => 'required'


        ];
    }



//    public function rules()
//    {
//        return [
//
////            'id ' => 'required',
//
//
//            'title' => 'required|string|max:255',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|min:120',
//            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|min:120',
//
//            'summary' => 'required|string|max:400',
//            'text1' => 'nullable|string|max:400',
//            'text2' => 'nullable|string|max:400',
//            'text3' => 'nullable|string|max:400',
//
//            'user_id' => 'required'
//
//
//        ];
//    }







    public function messages()
    {
        return [
            'title.required' => trans('validation.required')  ,
            'title.string' => trans('validation.string')  ,
            'title.max:110' => trans('validation.max')  ,

            'image.required' => trans('validation.required')  ,
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
