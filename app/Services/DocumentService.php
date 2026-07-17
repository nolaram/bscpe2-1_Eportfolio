<?php

namespace App\Services;

use App\Models\Student;

class DocumentService
{
    public function getStudentDocuments(Student $student)
    {
        return $student
            ->documents()
            ->latest()
            ->paginate(10);
    }
}