<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\ApiValidationRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            // 'image' => 'required|image|max:10000',
            'source' => 'required',
            'slug' => 'required'
        ];
    }

    public function getData(){
      return $this->only(['name', 'source', 'slug']);
    }
}
