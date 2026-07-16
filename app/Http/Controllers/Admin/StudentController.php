<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Services\StudentService;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Adviser;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        protected StudentService $studentService
    ) {}

    public function index(Request $request)
    {
        $students = $this->studentService->getAllStudents(
            $request->search,
            $request->adviser
        );

        $advisers = Adviser::orderBy('last_name')->get();

        return view(
            'admin.students.index',
            compact(
                'students',
                'advisers'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        // dd('Store Reached');

        try {

            $this->studentService->createStudent(
                $request->validated()
            );

            return redirect()
                ->route('admin.students.index')
                ->with('success', 'Student created successfully.');

        } catch (\Throwable $e) {

            // dd($e->getMessage());

            report($e);

            return back()
                ->withInput()
                ->with('error', 'Unable to create student.');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load([
            'user',
            'adviser',
            'dailyAttendances',
        ]);

        $hoursRendered = $student->dailyAttendances
            ->where('status', 'Submitted')
            ->sum('hours_rendered');

        $requiredHours = 300;

        $statistics = [

            'attendance_logs' => $student->dailyAttendances->count(),

            'hours_rendered' => $hoursRendered,

            'remaining_hours' => max(
                0,
                $requiredHours - $hoursRendered
            ),

            'progress' => min(
                100,
                round(($hoursRendered / $requiredHours) * 100)
            ),

        ];

        return view(
            'admin.students.show',
            compact(
                'student',
                'statistics'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view(
            'admin.students.edit',
            compact('student')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateStudentRequest $request,
        Student $student
    )
    {
        $this->studentService->updateStudent(
            $student,
            $request->validated()
        );

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student updated successfully.');
    }

    // public function update(
    //     UpdateStudentRequest $request,
    //     Student $student
    // )
    // {
    //     dd($request->validated());

    //     $this->studentService->updateStudent(
    //         $student,
    //         $request->validated()
    //     );
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $this->studentService->deleteStudent($student);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }

    public function assignAdviserForm(Student $student)
    {
        $advisers = Adviser::orderBy('last_name')->get();

        return view(
            'admin.students.assign-adviser',
            compact('student', 'advisers')
        );
    }

    public function assignAdviser(
        Request $request,
        Student $student
    )
    {
        $validated = $request->validate([

            'adviser_id' => [
                'required',
                'exists:advisers,id',
            ],

        ]);

        $adviser = Adviser::findOrFail(
            $validated['adviser_id']
        );

        $this->studentService->assignAdviser(
            $student,
            $adviser
        );

        return redirect()
            ->route('admin.students.index')
            ->with(
                'success',
                'Adviser assigned successfully.'
            );
    }

}
