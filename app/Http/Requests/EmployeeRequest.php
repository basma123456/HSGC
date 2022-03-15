<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'f_name'=> 'required|string|max:255|min:3',
            'l_name'=> 'required|string|max:255|min:3',
            'email' => 'required|email|unique:employees,email|max:255',
            'title' => 'required|string|max:255',
            'phone_number' => 'required|string|max:11',
            'address' => 'required|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|min:100',
            'summary' => 'required|string|max:500',
            'resume' => 'required|mimes:pdf,doc,docx,txt',
            'user_id ' => 'nullable',
            'status' => 'nullable|integer'

        ];
    }
    public function messages()
    {
        return [
            'f_name.required' => trans('validation.required')  ,
            'f_name.string' => trans('validation.string')  ,
            'f_name.max:255' => trans('validation.max')  ,
            'f_name.min:3' =>  trans('validation.min') ,

            'l_name.required' => trans('validation.required')  ,
            'l_name.string' => trans('validation.string')  ,
            'l_name.max:255' => trans('validation.max')  ,
            'l_name.min:3' => trans('validation.min')  ,

            'email.required' => trans('validation.required')  ,
            'email.unique' => trans('validation.unique')  ,
            'email.string' => trans('validation.string')  ,
            'email.max:255' => trans('validation.max')  ,
            'email.email'   => trans('validation.email'),
            'title.required' => trans('validation.required')  ,
            'title.string' => trans('validation.string')  ,
            'title.max:255' => trans('validation.max')  ,

            'phone_number.required' => trans('validation.required')  ,
            'phone_number.string' => trans('validation.string')  ,
            'phone_number.max:11' => trans('validation.max')  ,

            'address.required' => trans('validation.required')  ,
            'address.string' => trans('validation.string')  ,


            'image.image' => trans('validation.image')  ,
            'image.mimes' => trans('validation.mimes')  ,
            'image.required' => trans('validation.required')  ,
            'image.min:100' => trans('validation.min')  ,



            'summary.required' => trans('validation.required')  ,
            'summary.max:500' => trans('validation.max')  ,
            'summary.string' => trans('validation.string')  ,

            'resume.required' => trans('validation.required')  ,


            'status.integer' => trans('validation.integer')

        ];
    }


}
