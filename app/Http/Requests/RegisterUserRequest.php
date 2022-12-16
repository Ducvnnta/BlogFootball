<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'name' => 'required|unique:users,email',
            'email' => 'required|unique:users,email|email:rfc,dns|max:100',
            'password' => 'required|string|max:100'

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
            'email.required' => trans('Email là không được để trống'),
            'email.max' => trans('Email nhiều nhất có ::attribute' ),
            'email.email' => trans('Email phải đúng định dạng'),
            // 'device_token.required' => trans('validation.required'),
        ];


    }



    /**
     * getAttributes
     *
     * @return void
     */
    public function getAttributes() {
        return $this->validated();
    }
}
