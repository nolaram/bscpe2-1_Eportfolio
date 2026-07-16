<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StudentService;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class DashboardController extends Controller
{

    public function __construct(
        protected StudentService $studentService
    ) {
    }

    public function index()
    {
        $student = Student::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        $statistics = $this->studentService
            ->getDashboardStatistics($student);

        return view(
            'student.dashboard',
            compact(
                'student',
                'statistics'
            )
        );
    }
}
