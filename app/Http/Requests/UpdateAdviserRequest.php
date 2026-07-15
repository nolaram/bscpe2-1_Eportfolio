<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdviserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $adviser = $this->route('adviser');

        return [

            'first_name' => [
                'required',
                'string',
                'max:100',
            ],

            'middle_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'last_name' => [
                'required',
                'string',
                'max:100',
            ],

            'department' => [
                'nullable',
                'string',
                'max:255',
            ],

            'contact_number' => [
                'nullable',
                'string',
                'max:20',
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users')
                    ->ignore($adviser->user),
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],

        ];
    }
}