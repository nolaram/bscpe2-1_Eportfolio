<?php

namespace App\Services;

use App\Models\Student;

class StudentProfileService
{
    public function updateProfile(
        Student $student,
        array $data
    ): Student
    {
        $student->update([

            'contact_number' => $data['contact_number'],

            'company_name' => $data['company_name'],

            'company_address' => $data['company_address'],

            'ojt_start_date' => $data['ojt_start_date'],

            'ojt_end_date' => $data['ojt_end_date'],

        ]);

        return $student->fresh();
    }
}