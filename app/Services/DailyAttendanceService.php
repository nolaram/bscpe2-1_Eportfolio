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

        $hoursRendered = $timeOut->diffInMinutes($timeIn) / 60;

        return DailyAttendance::create([

            'student_id' => $student->id,

            'attendance_date' => $data['attendance_date'],

            'time_in' => $data['time_in'],

            'time_out' => $data['time_out'],

            'hours_rendered' => $hoursRendered,

            'status' => 'Pending',

        ]);
    }

    public function updateAttendance(
        DailyAttendance $attendance,
        array $data
    ): DailyAttendance
    {
        if ($attendance->status !== 'Pending') {

            throw new \Exception(
                'Only pending attendance can be edited.'
            );

        }

        $timeIn = Carbon::parse($data['time_in']);

        $timeOut = Carbon::parse($data['time_out']);

        $hoursRendered =
            $timeOut->diffInMinutes($timeIn) / 60;

        $attendance->update([

            'attendance_date' => $data['attendance_date'],

            'time_in' => $data['time_in'],

            'time_out' => $data['time_out'],

            'hours_rendered' => $hoursRendered,

        ]);

        return $attendance->fresh();
    }

    public function deleteAttendance(
        DailyAttendance $dailyAttendance
    ): void
    {
        if ($dailyAttendance->status !== 'Pending') {

            throw new \Exception(
                'Only pending attendance can be deleted.'
            );

        }

        $dailyAttendance->delete();
    }

}