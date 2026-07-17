<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'category' => [
                'required',
                'in:Before OJT,During OJT,After OJT'
            ],

            'document_name' => [
                'required',
                'string',
                'max:255'
            ],

            'document_file' => [
                'required',
                'file',
                'mimes:pdf,doc,docx,jpg,jpeg,png',
                'max:10048'
            ],

        ];
    }

    public function messages(): array
    {
        return [

            'document_file.required' => 'Please select a file.',

            'document_file.max' => 'The file must not exceed 10 MB.',

            'document_file.mimes' => 'Only PDF, DOC, DOCX, JPG, JPEG, and PNG files are allowed.',

        ];
    }
}