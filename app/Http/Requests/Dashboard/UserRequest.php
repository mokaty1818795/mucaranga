<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() :array
    {
        return [
            'name' =>'required|string',
            'email'=>'required|email',
            'password' => 'required|min:8|confirmed',
            'contact' => 'string',
            'active'=>'boolean',
            'genre' =>'required|boolean',
            'role_id' => 'required|numeric'
        ];
    }
}
