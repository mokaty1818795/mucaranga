<?php

namespace App\Http\Requests;

use App\Models\VeicleClass;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVeicleClassRequest extends FormRequest
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
            'name' => ['required',Rule::unique('veicle_classes')->ignore(VeicleClass::find(decrypt($this->unique_hash)),'name')]
        ];
    }
}
