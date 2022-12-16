<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|max:100',
            'password' => 'required|min:3|max:100'
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            'email.max' => 'Email nhiều nhất có ::attribute',
            'email.email' => 'Email phải đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'password.max' => 'Mật khẩu nhiều nhất có :max kí tự',
            'password.min' => 'Mật khẩu phải có ít nhất :min kí tự',
        ];


    }


    public function getData(){
      return $this->only(['email', 'password']);
    }
}
