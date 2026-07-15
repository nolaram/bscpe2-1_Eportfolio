<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class StoreDailyAttendanceRequest extends FormRequest
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
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [

            'attendance_date' => [

                'required',

                'date',

                Rule::unique('daily_attendances')
                    ->where(function ($query) {

                        $student = Student::where(
                            'user_id',
                            Auth::id()
                        )->first();

                        return $query->where(
                            'student_id',
                            $student->id
                        );

                    }),

            ],

            'time_in' => [

                'required',

                'date_format:H:i',

            ],

            'time_out' => [

                'required',

                'date_format:H:i',

                'after:time_in',

            ],

        ];
    }

    public function messages(): array
    {
        return [

            'attendance_date.unique' =>
                'You have already submitted attendance for this date.',

        ];
    }
}
