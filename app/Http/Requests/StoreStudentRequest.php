<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            "name" => "required| string",
            "father_name" => "required|string",
            "mother_name" => "required|string",
            "birth_day" => "required|date",
            "civil_state_id" => "required|integer",
            "natural_location" => "required|string",
            "natural_district" => "required|string",
            "natural_province" => "required|string",
            "id_identity" => "required|string",
            "id_emision_date" => "required|date",
            "id_emited_with" => "required|string",
            "veicle_classe_id" => "required|integer",
        ];
    }
}
