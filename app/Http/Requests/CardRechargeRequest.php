<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class CardRechargeRequest extends BaseRequest
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
            'code' => 'required|min:8',
            'serial' => 'required|min:8',
            'amount' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'telco.required' => 'Vui lòng chọn loại thẻ',
            'required' => 'Trường :attribute không được bỏ trống',
            'amount.required' => 'Vui lòng chọn mệnh giá',
            'serial.min' => 'Serial Không hợp lệ',
            'code.min' => 'Mã thẻ không hợp lệ'
        ];
    }
}
