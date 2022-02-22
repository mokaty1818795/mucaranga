<?php

namespace App\Http\Requests;

use App\Models\PaymentPhase;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePaymentPhaseRequest extends FormRequest
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
            'name' => ['required',Rule::unique('payment_phases')->ignore(PaymentPhase::find(decrypt($this->unique_hash)),'name')],
          
        ];
    }
}
