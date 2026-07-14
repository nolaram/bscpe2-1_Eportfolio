<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_number' => 'required|string|max:20|unique:students,student_number',

            'first_name' => 'required|string|max:100',

            'last_name' => 'required|string|max:100',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
