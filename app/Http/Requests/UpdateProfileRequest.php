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
            'image' => 'required|max:1024',
            'name' => 'required|max:255',
            'phone' => 'nullable|regex:/^([0-9]*)$/|max:11',
            'email' => 'nullable|regex:/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/|unique:users,email,'.$this->id,

        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên của bạn',
            'phone' => 'Số điện thoại',
            'email' => 'Email',
            'image' => 'Ảnh đại diện'
        ];
    }

    public function getDataUser()
    {
        $data = $this->only(['name', 'phone', 'email']);
        return $data;
    }

}
