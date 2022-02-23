<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentUploadRequest extends FormRequest
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
            'document_file' =>
            'required|mimetypes:application/pdf,image/svg+xml,image/webp,image/png,image/jpeg,image/bmp,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword'
        ];
    }
    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{
    return [
        'document_file.required' => 'Por favor anexe o documento',
        'document_file.mimetypes' =>
        'Por favor certifique se o documento é um(a) [imagem ou pdf ou documento word] '
    ];
}
}
