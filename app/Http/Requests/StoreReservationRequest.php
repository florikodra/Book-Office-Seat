<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreReservationRequest extends FormRequest
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
            "office_id" => 'required|numeric|exists:offices,id',
            "employee_id" => 'required|numeric|exists:employees,id',
            "seat_no" => 'required|numeric',
            "date" => 'required|date',
            "start_at" => 'required|required_with:end_at|date_format:H:i|after_or_equal:08:00|before_or_equal:17:00|before:end_at',
            "end_at" => 'required|required_with:start_at|date_format:H:i|after_or_equal:08:00|after:start_at|before_or_equal:17:00'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }
}
