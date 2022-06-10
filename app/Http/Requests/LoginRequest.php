<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'required|string|regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/|max:12',
            'password' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập vào trường :attribute'
        ];
    }
}
