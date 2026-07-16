<?php

namespace App\Services;

use App\Models\Adviser;
use App\Models\Role;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\DailyAttendance;

class AdviserService
{
    public function __construct(
        protected UserService $userService
    ) {
    }

    /**
     * Get all advisers.
     */
    public function getAllAdvisers(): LengthAwarePaginator
    {
        return Adviser::with('user')
            ->orderBy('last_name')
            ->paginate(10);
    }

    /**
     * Create adviser.
     */
    public function createAdviser(array $data): Adviser
    {
        return DB::transaction(function () use ($data) {

            $user = $this->userService->createUser([
                'role' => 'Adviser',
                'name' => $data['first_name'].' '.$data['last_name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]);

            return Adviser::create([

                'user_id' => $user->id,

                'first_name' => $data['first_name'],

                'middle_name' => $data['middle_name'] ?? null,

                'last_name' => $data['last_name'],

                'department' => $data['department'] ?? null,

                'contact_number' => $data['contact_number'] ?? null,

                'profile_picture' => null,

            ]);
        });
    }

    /**
     * Update adviser.
     */
    public function updateAdviser(
        Adviser $adviser,
        array $data
    ): Adviser {

        return DB::transaction(function () use ($adviser, $data) {

            $this->userService->updateUser(
                $adviser->user,
                $data
            );

            $adviser->update([

                'first_name' => $data['first_name'],

                'middle_name' => $data['middle_name'] ?? null,

                'last_name' => $data['last_name'],

                'department' => $data['department'] ?? null,

                'contact_number' => $data['contact_number'] ?? null,

            ]);

            return $adviser->fresh('user');

        });
    }

    /**
     * Delete adviser.
     */
    public function deleteAdviser(Adviser $adviser): void
    {
        DB::transaction(function () use ($adviser) {

            $user = $adviser->user;

            $adviser->delete();

            $this->userService->deleteUser($user);

        });
    }

    public function getAssignedStudents(
        Adviser $adviser
    ): LengthAwarePaginator
    {
        return $adviser->students()
            ->orderBy('last_name')
            ->paginate(10);
    }

    public function getStudentAttendances(
        Student $student
    ): LengthAwarePaginator
    {
        return $student->dailyAttendances()
            ->latest('attendance_date')
            ->paginate(10);
    }

    public function getAttendance(
        DailyAttendance $attendance
    ): DailyAttendance
    {
        return $attendance->load('student');
    }

    public function approveAttendance(
        DailyAttendance $attendance
    ): DailyAttendance
    {
        if ($attendance->status !== 'Pending') {

            throw new \Exception(
                'Only pending attendance can be approved.'
            );

        }

        $attendance->update([

            'status' => 'Approved',

        ]);

        return $attendance->fresh();
    }

    public function rejectAttendance(
        DailyAttendance $attendance
    ): DailyAttendance
    {
        if ($attendance->status !== 'Pending') {

            throw new \Exception(
                'Only pending attendance can be rejected.'
            );


        }

        $attendance->update([

            'status' => 'Rejected',

        ]);

        return $attendance->fresh();
    }

    public function getDashboardStatistics(
        Adviser $adviser
    ): array
    {
        $studentIds = $adviser->students()
            ->pluck('id');

        return [

            'assigned_students' => $studentIds->count(),

            'pending_attendance' => \App\Models\DailyAttendance::whereIn(
                'student_id',
                $studentIds
            )->where(
                'status',
                'Pending'
            )->count(),

            'approved_today' => \App\Models\DailyAttendance::whereIn(
                'student_id',
                $studentIds
            )->where(
                'status',
                'Approved'
            )->whereDate(
                'updated_at',
                today()
            )->count(),

            'rejected' => \App\Models\DailyAttendance::whereIn(
                'student_id',
                $studentIds
            )->where(
                'status',
                'Rejected'
            )->count(),

        ];
    }
}