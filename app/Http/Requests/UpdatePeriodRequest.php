<?php

namespace App\Http\Requests;

use App\Models\Period;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePeriodRequest extends FormRequest
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
            'name' => ['required',Rule::unique('periods')->ignore(Period::find(decrypt($this->unique_hash)),'name')],
            'init_at' => 'required|before:end_at|date_format:H:i',
            'end_at' => 'required|after:init_at|date_format:H:i'
        ];
    }
}
