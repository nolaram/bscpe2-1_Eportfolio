<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [

            'contact_number' => [
                'nullable',
                'string',
                'max:20',
            ],

            'company_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'company_address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'ojt_start_date' => [
                'nullable',
                'date',
            ],

            'ojt_end_date' => [
                'nullable',
                'date',
                'after_or_equal:ojt_start_date',
            ],

        ];
    }
}