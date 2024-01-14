<?php

namespace App\Http\Requests\Dashboard\Branch;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'        => 'required|string|unique:branches,name',
            'firstPhone'  => 'required|string',
            'secondPhone' => 'required|string',
            'address'     => 'required|string',
            'area_id'     => 'required|integer|exists:areas,id',
        ];
    }


    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name.required'        => trans('validation.required'),
            'name.string'          => trans('validation.string'),
            'name.unique'          => trans('validation.unique'),
            'firstPhone.required'  => trans('validation.required'),
            'firstPhone.string'    => trans('validation.string'),
            'secondPhone.required' => trans('validation.required'),
            'secondPhone.string'   => trans('validation.string'),
            'address.required'     => trans('validation.required'),
            'address.string'       => trans('validation.string'),
            'area_id.required'     => trans('validation.required'),
            'area_id.integer'      => trans('validation.integer'),
        ];
    }
}
