<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAboutCompanyRequset extends FormRequest
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
            'about_company_summary' => 'required|string',
            'left_first_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|min:120',
            'left_second_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|min:120',
            'our_vision_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|min:120',
            'our_vision_summary' => 'required|string',
//            'behind_hsgc_summary' => 'required|string',
            'work_with_us_summary' => 'required|string',
            'user_id' => 'required|integer',


        ];
    }


    public function messages()
    {


        return [
            'about_company_summary.required' => trans('validation.required')  ,
            'about_company_summary.string' => trans('validation.string')  ,

            'left_first_image.required' => trans('validation.required')  ,
            'left_first_image.image' => trans('validation.image')  ,
            'left_first_image.mimes' => trans('validation.mimes')  ,
            'left_first_image.min:120' => trans('validation.min:120')  ,

            'left_second_image.required' => trans('validation.required')  ,
            'left_second_image.image' => trans('validation.image')  ,
            'left_second_image.mimes' => trans('validation.mimes')  ,
            'left_second_image.min:120' => trans('validation.min:120')  ,


            'our_vision_image.required' => trans('validation.required')  ,
            'our_vision_image.image' => trans('validation.image')  ,
            'our_vision_image.mimes' => trans('validation.mimes')  ,
            'our_vision_image.min:120' => trans('validation.min:120')  ,


            'our_vision_summary.required' => trans('validation.required')  ,
            'our_vision_summary.string' => trans('validation.string')  ,


            'work_with_us_summary.required' => trans('validation.required')  ,
            'work_with_us_summary.string' => trans('validation.string')  ,

            'user_id.required' => trans('validation.required'),
            'user_id.integer' => trans('validation.integer')


        ];

    }

}
