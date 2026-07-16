<?php

namespace App\Services;

use App\Models\DailyAttendance;
use App\Models\Student;
use Carbon\Carbon;
use App\Http\Requests\UpdateDailyAttendanceRequest;

class DailyAttendanceService
{
    public function createAttendance(Student $student, array $data): DailyAttendance
    {
        $timeIn = Carbon::parse($data['time_in']);
        $timeOut = Carbon::parse($data['time_out']);

        $minutes = $timeIn->diffInMinutes($timeOut);

        $hoursRendered = round($minutes / 60, 2);

        $hasLunchBreak = !empty($data['has_lunch_break']);

        if ($hasLunchBreak) {
            $hoursRendered -= 1;
        }

        $hoursRendered = max(0, $hoursRendered);

        return DailyAttendance::create([

            'student_id' => $student->id,

            'attendance_date' => $data['attendance_date'],

            'time_in' => $data['time_in'],

            'time_out' => $data['time_out'],

            'has_lunch_break' => $hasLunchBreak,

            'hours_rendered' => $hoursRendered,

            'status' => 'Submitted',

        ]);
    }

    public function updateAttendance(
        DailyAttendance $attendance,
        array $data
    ): DailyAttendance
    {

        $timeIn = Carbon::parse($data['time_in']);
        $timeOut = Carbon::parse($data['time_out']);

        $minutes = $timeIn->diffInMinutes($timeOut);

        $hoursRendered = round($minutes / 60, 2);

        if ($data['has_lunch_break']) {
            $hoursRendered -= 1;
        }

        $hoursRendered = max(0, $hoursRendered);

        $attendance->update([

            'attendance_date' => $data['attendance_date'],

            'time_in' => $data['time_in'],

            'time_out' => $data['time_out'],

            'has_lunch_break' => !empty($data['has_lunch_break']),

            'hours_rendered' => $hoursRendered,

        ]);

        return $attendance->fresh();
    }

    public function deleteAttendance(
        DailyAttendance $dailyAttendance
    ): void
    {
        $dailyAttendance->delete();
    }

}