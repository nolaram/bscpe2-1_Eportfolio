<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StudentService;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct(
        protected StudentService $studentService
    ) {
    }

    public function index()
    {
        $student = $this->studentService
            ->getStudentByUserId(Auth::id());

        return view(
            'student.dashboard',
            compact('student')
        );
    }
}
