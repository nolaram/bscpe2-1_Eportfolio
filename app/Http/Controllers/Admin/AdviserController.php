<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\AdviserService;
use App\Http\Requests\StoreAdviserRequest;
use App\Http\Requests\UpdateAdviserRequest;
use App\Models\Adviser;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\DailyAttendance;

class AdviserController extends Controller
{   

    public function __construct(
        protected AdviserService $adviserService
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advisers = $this->adviserService->getAllAdvisers();

        return view(
            'admin.advisers.index',
            compact('advisers')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advisers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdviserRequest $request)
    {
        $this->adviserService->createAdviser(
            $request->validated()
        );

        return redirect()
            ->route('admin.advisers.index')
            ->with('success', 'Adviser created successfully.');
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
    public function edit(Adviser $adviser)
    {
        return view(
            'admin.advisers.edit',
            compact('adviser')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateAdviserRequest $request,
        Adviser $adviser
    )
    {
        $this->adviserService->updateAdviser(
            $adviser,
            $request->validated()
        );

        return redirect()
            ->route('admin.advisers.index')
            ->with('success', 'Adviser updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adviser $adviser)
    {
        $this->adviserService->deleteAdviser($adviser);

        return redirect()
            ->route('admin.advisers.index')
            ->with('success', 'Adviser deleted successfully.');
    }

    public function assignedStudents()
    {
        $adviser = Adviser::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        $students = $this->adviserService
            ->getAssignedStudents($adviser);

        return view(
            'adviser.students.index',
            compact('students')
        );
    }

    public function studentAttendances(
        Student $student
    )
    {
        $attendances = $this->adviserService
            ->getStudentAttendances($student);

        return view(
            'adviser.attendances.index',
            compact(
                'student',
                'attendances'
            )
        );
    }

    public function showAttendance(
        DailyAttendance $attendance
    )
    {
        $attendance = $this->adviserService
            ->getAttendance($attendance);

        return view(
            'adviser.attendances.show',
            compact('attendance')
        );
    }

    public function approve(
        DailyAttendance $attendance
    )
    {
        $this->adviserService
            ->approveAttendance($attendance);

        return redirect()
            ->route(
                'adviser.attendances.show',
                $attendance
            )
            ->with(
                'success',
                'Attendance approved successfully.'
            );
    }

    public function reject(
        DailyAttendance $attendance
    )
    {
        $this->adviserService
            ->rejectAttendance($attendance);

        return redirect()
            ->route(
                'adviser.attendances.show',
                $attendance
            )
            ->with(
                'success',
                'Attendance rejected successfully.'
            );
    }
}
