<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
class CarRequest extends FormRequest
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
            "name"=>"required|string",
            "car_make_id"=>"required|integer",
            "car_model_id"=>"required|integer"
        ];
    }

    public function messages()
    {
        return[
            "name.required"=> "Name is required",
            "name.string"=>"Name must be string",
            "car_make_id.required"=>"Car Make Id is required",
            "car_make_id.integer"=>"Car Make Id must be integer",
            "car_model_id.required"=>"Car Model Id is required",
            "car_mmodel_id.integer"=>"Car Model Id must be integer",
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
