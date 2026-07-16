<?php

namespace App\Services;

use App\Models\Student;
use App\Models\Adviser;
use App\Models\DailyAttendance;

class AdminService
{
    public function getDashboardStatistics(): array
    {
        return [

            'students' => Student::count(),

            'advisers' => Adviser::count(),

            'attendance_logs' => DailyAttendance::count(),

            'hours_rendered' => DailyAttendance::sum('hours_rendered'),

        ];
    }
}