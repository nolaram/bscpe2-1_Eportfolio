<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $student = $this->route('student');

        return [

            'student_number' => [
                'required',
                Rule::unique('students')
                    ->ignore($student),
            ],

            'first_name' => [
                'required',
                'string',
                'max:100',
            ],

            'last_name' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users')
                    ->ignore($student->user),
            ],

            'password' => [
                'nullable',
                'min:8',
            ],

        ];
    }
}