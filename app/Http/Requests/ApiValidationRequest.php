<?php

namespace App\Http\Requests;

use App\Traits\ApiResponser;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class ApiValidationRequest extends FormRequest
{
    use ApiResponser;

    public function failedValidation(Validator $validator)
    {
        $response = [
            'status_code' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'error' => $validator->errors()->toArray()
        ];

        $message = $validator->errors()->toArray();
        $statusCode = Response::HTTP_UNPROCESSABLE_ENTITY;

        throw new HttpResponseException($this->errorResponse($message, $statusCode));
    }

    /**
     * @return string
     */
    protected function getTelRegexRule()
    {
        return 'regex:/' . config('constant.regex.tel') . '/i';
    }

    /**
     * @return string
     */
    protected function getZipCodeRegexRule()
    {
        return 'regex:/' . config('constant.regex.zipcode') . '/i';
    }
}
