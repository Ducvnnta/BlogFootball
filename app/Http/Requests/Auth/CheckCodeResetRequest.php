<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class CheckCodeResetRequest extends FormRequest
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
            'code'=>'required|string'
        ];
    }

    public function messages()
    {
        $messages = [
            'code.required' => 'Code không được để trống',
        ];
        return $messages;
    }

}

