<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExamRequest extends FormRequest
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
            'exam_tpye_id' => 'required|numeric',
            'student_id' => 'required|numeric',
            'paymentType' => 'required|numeric',
            'bank_invoice_code' => 'nullable|string|required_if:paymentType,1',
            'bank_invoice_id' => 'nullable|mimetypes:application/pdf,image/svg+xml,image/webp,image/png,image/jpeg,image/bmp,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword|required_if:paymentType,1',
        ];
    }
}
