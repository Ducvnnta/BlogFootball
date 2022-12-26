<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'image' => 'required|max:10000',
            'name' => 'required|max:255',
            'phone' => 'required|regex:/^([0-9]*)$/|max:11',
            'email' => 'required' ,

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
            'email.required' => trans('Email không được để trống'),
            'email.max' => trans('Email nhiều nhất có :max' ),
            'email.email' => trans('Email phải đúng định dạng'),
            'email.unique' => trans('Email này đã được sử dựng'),
            'image.required' => trans('Ảnh đại diện không được để trống'),
            'image.max' => trans('Ảnh đại diện có dung lượng lớn nhất là ::max GB' ),
            'image.image' => trans('Ảnh đại diện phải đúng định dạng'),
            'password.required' => trans('Mật khẩu không được để trống'),
            'password.regex' => trans('Mật khẩu chứa kí tự đặc biệt' ),
            'password.max' => trans('Mật khẩu nhiều nhất có :max kí tự' ),
            'password.min' => trans('Mật khẩu ít nhất có :min kí tự' ),
            'name.required' => trans('Tên  không được để trống'),
            'name.max' => trans('Tên nhiều nhất có :max kí tự' ),
            'confirm_password.required' => trans('Xác nhận mật khẩu là bắt buộc'),
            'confirm_password.same' => trans('Xin hãy xác nhận lại mật khẩu'),
            'phone.required' => trans('SĐT không được để trống'),
            'phone.regex' => trans('SĐT phải đúng định dạng'),
            'phone.max' => trans('SĐT nhiều nhất có :max số'),
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

    public function getDataUser()
    {
        $data = $this->only(['name', 'phone', 'email']);
        return $data;
    }

}
