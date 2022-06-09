<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'fullname' => 'required',
            'username' => 'required|string|regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/|max:12|unique:users,username',
            'email' => 'required|email:filter|unique:users,email',
            'password' => 'required|string|min:3',

        ];
    }
    public function messages()
    {   
        return [
           'required' => 'Vui lòng nhập vào trường :attribute',
           'max' => ':attribute không được vượt quá :max kí tự',
           'min' => 'Trường :attribute phải ít nhất :min kí tự',
           'regex' => 'Định dạng không hợp lệ',
           'same' => 'mật khẩu nhập lại không khớp',
           'email' => ':attribute không hợp lệ',
           'unique' => ':attribute này đã tồn tại trên hệ thống',
           'string' => ':attribute không đúng định dạng string'
        ];

    }

    public function attributes()
    {
        return [
           'username' => 'Tên tài khoản',
           'password' => 'Mật khẩu',
           'fullname' => 'Họ tên'
        ];
    }
}
