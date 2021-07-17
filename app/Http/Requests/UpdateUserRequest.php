<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'          => 'required|min:5|max:50',
            'email'         => "required|email|unique:users,email, $this->id",
            'phone'         => "required|digits_between:10,11|regex:/(0)[0-9]{9}/|unique:users,phone, $this->id",
            'address'       => 'required|min:5|max:100',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => ':attribute không được để trống',
            'name.min'              => ':attribute phải lớn hơn :min ký tự',
            'name.max'              => ':attribute phải nhỏ hơn :max ký tự',

            'email.required'        => ':attribute không được để trống',
            'email.email'           => ':attribute không hợp lệ',
            'email.unique'          => ':attribute đã tồn tại',

            'phone.required'        => ':attribute không được để trống',
            'phone.digits_between'  => ':attribute chỉ chứa số và có độ dài 10 hoặc 11 ký tự',
            'phone.regex'           => ':attribute không hợp lệ',
            'phone.unique'          => ':attribute đã tồn tại',

            'address.required'      => ':attribute không được để trống',
            'address.min'           => ':attribute phải lớn hơn :min ký tự',
            'address.max'           => ':attribute phải nhỏ hơn :max ký tự',
        ];
    }

    public function attributes()
    {
        return [
            'name'          => 'Họ tên',
            'email'         => 'Email',
            'phone'         => 'Số điện thoại',
            'address'       => 'Địa chỉ',
            'password'      => 'Mật khẩu'
        ];
    }
}
