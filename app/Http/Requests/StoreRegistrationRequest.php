<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrationRequest extends FormRequest
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
            'payment_phase_id' => 'required|numeric',
            'student_id' => 'required|numeric',
            'processed_by_id' => 'required|numeric',
            'invoice_id' => 'nullable|numeric',
            'bank_invoice_id' => 'nullable|numeric',
            'amount' => 'numeric|required'
        ];
    }
}
