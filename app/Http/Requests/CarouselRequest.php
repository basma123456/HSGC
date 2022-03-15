<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarouselRequest extends FormRequest
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
            'carousel_name'=>'required|string|max:255',
            'user_id'=>'required|integer'

        ];
    }


    public function messages()
    {
        return [
            'carousel_name.required' => trans('validation.required')  ,
            'user_id.required' => trans('validation.required')  ,
            'carousel_name.max:255' => trans('validation.max')  ,
            'carousel_name.string' => trans('validation.string')  ,
            'user_id.integer' => trans('validation.integer')


        ];
    }

}
