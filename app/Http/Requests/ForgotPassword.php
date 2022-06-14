<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPassword extends FormRequest
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
            'email' => 'required|email:filter|exists:users,email'
         ];
    }

    public function messages()
    {
        return [
            'required' => 'Trường :attribute Không được bỏ trống',
            'email' => 'Không đúng định dạng email',
            'exists' => 'Địa chỉ email này không tồn tại trên hệ thống'
        ];
    }
}
