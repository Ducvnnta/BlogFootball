<?php

namespace App\Http\Requests;

class PaginationRequest extends ApiValidationRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'per_page'                => 'nullable|integer|min:1|max:100',
            'page'                    => 'nullable|integer|min:1',
        ];
    }
}
