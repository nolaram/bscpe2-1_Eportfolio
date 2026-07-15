<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class UpdateDailyAttendanceRequest extends FormRequest
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
        $student = Student::where(
            'user_id',
            Auth::id()
        )->first();

        $attendance = $this->route('daily_attendance');

        return [

            'attendance_date' => [

                'required',

                'date',

                Rule::unique('daily_attendances')
                    ->ignore($attendance->id)
                    ->where(function ($query) use ($student) {

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
}
