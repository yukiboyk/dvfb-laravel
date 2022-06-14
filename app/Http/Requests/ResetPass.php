<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPass extends FormRequest
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
            'password' => 'required|min:3',
            'repassword' => 'required|same:password',
            'token' => 'required'
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'trường :attribute không được bỏ trống',
            'min' => 'Trường :attribute phải tối thiếu :min kí tự',
            'same' => 'Mật khẩu nhập lại không khớp'

        ];
    }
}
