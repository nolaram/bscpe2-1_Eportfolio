<?php

namespace App\Services;

use App\Models\Student;

class WeeklyReportService
{
    public function getStudentReports(Student $student)
    {
        return $student
            ->weeklyReports()
            ->latest()
            ->paginate(10);
    }
}