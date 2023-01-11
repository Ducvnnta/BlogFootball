<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;

class PostCommentsRequest extends FormRequest
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
            'text' => 'required|max:10000',


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
            'text.required' => 'Comments không được để trống',
            'text.max' => 'Comments nhiều nhất chỉ được :max kí tự',

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

    public function getData()
    {
        $data = $this->only(['text']);
        return $data;
    }

}
