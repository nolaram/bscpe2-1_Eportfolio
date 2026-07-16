<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Student\UpdateProfileRequest;
use App\Services\StudentProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct(
        protected StudentProfileService $profileService
    ) {
    }

    public function edit(): View
    {
        $student = auth()->user()
            ->student()
            ->with([
                'adviser',
                'dailyAttendances'
            ])
            ->first();

        $hoursRendered = $student->dailyAttendances
            ->where('status', 'Submitted')
            ->sum('hours_rendered');

        $attendanceLogs = $student->dailyAttendances->count();

        $submittedLogs = $student->dailyAttendances
            ->where('status', 'Submitted')
            ->count();

        $pendingLogs = $student->dailyAttendances
            ->where('status', 'Pending')
            ->count();

        $statistics = [
            'hours_rendered' => $hoursRendered,
            'remaining_hours' => max(0, 300 - $hoursRendered),
            'progress' => min(100, ($hoursRendered / 300) * 100),
            'attendance_logs' => $attendanceLogs,
            'submitted_logs' => $submittedLogs,
            'pending_logs' => $pendingLogs,
        ];

        return view(
            'student.profile.edit',
            compact(
                'student',
                'statistics'
            )
        );
    }

    public function update(
        UpdateProfileRequest $request
    ): RedirectResponse {

        $student = auth()
            ->user()
            ->student;

        $this->profileService->updateProfile(
            $student,
            $request->validated()
        );

        return back()->with(
            'success',
            'Profile updated successfully.'
        );
    }
}