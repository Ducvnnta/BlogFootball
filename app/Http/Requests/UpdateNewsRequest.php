<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'image_url' => 'required|image|max:10000',
            'category_id' => 'required',
            'detail' => 'required',
            'link' => 'required',
            'source' => 'required',

        ];
    }

    public function getData()
    {
        return $this->only(['title', 'description', 'detail', 'link', 'source', 'category_id']);
    }

        /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Tên giải đấu không được để trống',
            'title.max' => 'Tên giải đấu nhiều nhất có ::attribute',
            'category_id.required' => 'Logo không được để trống',
            'image.image' => 'Logo không đúng định dạng',
            'category_id.required' => 'Logo không được để trống',
            'detail' => 'required',
            'link.required' => 'Logo không được để trống',
            'image_url.required' => 'Logo không được để trống',
            'source.required' => 'Logo không được để trống',

        ];


    }

}
