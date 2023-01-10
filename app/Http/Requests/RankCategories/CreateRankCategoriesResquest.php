<?php

namespace App\Http\Requests\RankCategories;

use Illuminate\Foundation\Http\FormRequest;

class CreateRankCategoriesResquest extends FormRequest
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
            'name' => 'required|max:255',
            'image' => 'required|image',
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
            'name.required' => 'Tên giải đấu không được để trống',
            'email.max' => 'Tên giải đấu nhiều nhất có ::attribute',
            'image.required' => 'Logo không được để trống',
            'image.image' => 'Logo không đúng định dạng',
        ];


    }

    public function getData(){
        return $this->only(['name', 'image']);
    }
}
