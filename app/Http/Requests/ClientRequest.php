<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|min:120',
            'summary' => 'nullable|string|max:120',
            'user_id ' => 'nullable',
            'trusted_client' => 'nullable|integer|max:1',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => trans('validation.required')  ,
            'image.image' => trans('validation.image')  ,
            'image.mimes' => trans('validation.mimes')  ,
            'image.min:120' => trans('validation.min')  ,
            'summary.string' => trans('validation.string')  ,
            'summary.max:120' => trans('validation.max')  ,
            'trusted_client.integer' => trans('validation.integer'),
            'user_id.integer' => trans('validation.integer')
        ];
    }
}
