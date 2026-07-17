<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Services\WeeklyReportService;
use Illuminate\View\View;
use App\Http\Requests\Student\StoreWeeklyReportRequest;
use App\Models\WeeklyReport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class WeeklyReportController extends Controller
{
    public function __construct(
        protected WeeklyReportService $weeklyReportService
    ) {
    }

    public function index(): View
    {
        $student = auth()->user()->student;

        $weeklyReports = $this->weeklyReportService
            ->getStudentReports($student);

        return view(
            'student.weekly-reports.index',
            compact('weeklyReports')
        );
    }

    public function create()
    {
        return view('student.weekly-reports.create');
    }

    public function store(
        StoreWeeklyReportRequest $request
    ): RedirectResponse
    {
        $student = auth()->user()->student;

        $data = $request->validated();

        if ($request->hasFile('report_file')) {

            $data['report_file'] = $request
                ->file('report_file')
                ->store('weekly-reports', 'public');

        }

        $data['student_id'] = $student->id;

        if ($data['status'] === 'Submitted') {

            $data['submitted_at'] = now();

        }

        WeeklyReport::create($data);

        return redirect()
            ->route('student.student.weekly-reports.index')
            ->with(
                'success',
                'Weekly report saved successfully.'
            );
    }

    public function show(WeeklyReport $weeklyReport)
    {
        abort_if(
            $weeklyReport->student_id != auth()->user()->student->id,
            403
        );

        return view(    
            'student.weekly-reports.show',
            compact('weeklyReport')
        );
    }

    public function edit(WeeklyReport $weeklyReport)
    {
        abort_if(
            $weeklyReport->student_id !== auth()->user()->student->id,
            403
        );

        return view(
            'student.weekly-reports.edit',
            compact('weeklyReport')
        );
    }

    public function update(
        StoreWeeklyReportRequest $request,
        WeeklyReport $weeklyReport
    )
    {
        abort_if(
            $weeklyReport->student_id !== auth()->user()->student->id,
            403
        );

        $data = $request->validated();

        if ($request->hasFile('report_file')) {

            if ($weeklyReport->report_file) {

                Storage::disk('public')
                    ->delete($weeklyReport->report_file);

            }

            $data['report_file'] = $request
                ->file('report_file')
                ->store('weekly-reports', 'public');

        }

        $weeklyReport->update($data);

        return redirect()
            ->route('student.student.weekly-reports.index')
            ->with(
                'success',
                'Weekly report updated successfully.'
            );
    }

    public function destroy(WeeklyReport $weeklyReport)
    {
        abort_if(
            $weeklyReport->student_id !== auth()->user()->student->id,
            403
        );

        if ($weeklyReport->report_file) {

            Storage::disk('public')
                ->delete($weeklyReport->report_file);

        }

        $weeklyReport->delete();

        return redirect()
            ->route('student.student.weekly-reports.index')
            ->with(
                'success',
                'Weekly report deleted successfully.'
            );
    }

    public function submit(WeeklyReport $weeklyReport)
    {
        abort_if(
            $weeklyReport->student_id !== auth()->user()->student->id,
            403
        );

        $weeklyReport->update([
            'status' => 'Submitted',
            'submitted_at' => now(),
        ]);

        return redirect()
            ->route('student.student.weekly-reports.index')
            ->with(
                'success',
                'Weekly report submitted successfully.'
            );
    }
}