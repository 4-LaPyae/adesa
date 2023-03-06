<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class CarModelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "car_make_id"=>"required|integer",
            "name"=>"required|string"
        ];
    }

    public function messages()
    {
        return[
            "car_make_id.required"=>"Car Make Id is required",
            "car_make_id.integer"=>"Car make id must be integer",
            "name.required"=>"Name is required",
            "name.string"=>"Name must be string"
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => true,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}
