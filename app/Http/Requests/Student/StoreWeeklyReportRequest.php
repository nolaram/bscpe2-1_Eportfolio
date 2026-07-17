<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeeklyReportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'week_number' => [
                'required',
                'integer',
                'min:1'
            ],

            'week_start' => [
                'required',
                'date'
            ],

            'week_end' => [
                'required',
                'date',
                'after_or_equal:week_start'
            ],

            'activities' => [
                'required',
                'string'
            ],

            'challenges' => [
                'nullable',
                'string'
            ],

            'skills_learned' => [
                'nullable',
                'string'
            ],

            'hours_rendered' => [
                'required',
                'numeric',
                'min:0',
                'max:60'
            ],

            'report_file' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx',
                'max:2048', // 2 MB
            ],

            'status' => [
                'required',
                'in:Draft,Submitted'
            ],

        ];
    }
}