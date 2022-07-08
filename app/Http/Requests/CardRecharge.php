<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRecharge extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'telco' => 'required',
            'code' => 'required',
            'serial' => 'required',
            'amount' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute không được bỏ trống'
        ];
    }
}
