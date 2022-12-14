<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
            'title' => 'required|max:255',
            'image_url' => 'required|image|max:10000',
            'category_id' => 'required',
            'description' => 'required',
            'detail' => 'required',
            'link' => 'required',
            'source' => 'required',
        ];
    }

    public function getData(){
      return $this->only(['title', 'description', 'detail', 'link', 'source', 'category_id']);
    }
}
