<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DailyAttendanceService;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDailyAttendanceRequest;
use App\Models\DailyAttendance;
use App\Http\Requests\UpdateDailyAttendanceRequest;

class DailyAttendanceController extends Controller
{   
    public function __construct(
        protected DailyAttendanceService $dailyAttendanceService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::where('user_id', Auth::id())->firstOrFail();

        $attendances = $student->dailyAttendances()
            ->latest('attendance_date')
            ->paginate(10);

        return view(
            'student.daily-attendances.index',
            compact('attendances')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.daily-attendances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDailyAttendanceRequest $request)
    {
        $student = Student::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        $this->dailyAttendanceService->createAttendance(
            $student,
            $request->validated()
        );

        return redirect()
            ->route('student.student.daily-attendances.index')
            ->with(
                'success',
                'Attendance submitted successfully.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DailyAttendance $dailyAttendance)
    {
        $this->authorize('update', $dailyAttendance);

        return view(
            'student.daily-attendances.edit',
            compact('dailyAttendance')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateDailyAttendanceRequest $request,
        DailyAttendance $dailyAttendance
    )
    {
        // dd($dailyAttendance

        $this->authorize('update', $dailyAttendance);

        $this->dailyAttendanceService->updateAttendance(
            $dailyAttendance,
            $request->validated()
        );

        return redirect()
            ->route('student.student.daily-attendances.index')
            ->with('success', 'Attendance updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        
        DailyAttendance $dailyAttendance
    )
    {
        // dd($dailyAttendance);

        $this->authorize('delete', $dailyAttendance);

        $this->dailyAttendanceService
            ->deleteAttendance($dailyAttendance);

        return redirect()
            ->route('student.student.daily-attendances.index')
            ->with(
                'success',
                'Attendance deleted successfully.'
            );
    }
}
