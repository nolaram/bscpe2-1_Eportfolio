<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Services\UserService;
use App\Models\Adviser;

class StudentService
{   
    public function __construct(
        protected UserService $userService
    ) {
    }
   
    public function getAllStudents(): LengthAwarePaginator
    {
        return Student::with('user')
            ->orderBy('student_number')
            ->paginate(10);
    }

    /**
     * Create a new student.
     */
    public function createStudent(array $data): Student
    {
        return DB::transaction(function () use ($data) {

            $studentRole = Role::where('name', 'Student')
                ->firstOrFail();

            $user = $this->userService->createUser([
            'role' => 'Student',
            'name' => $data['first_name'].' '.$data['last_name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

            return Student::create([
                'user_id' => $user->id,
                'role_id' => $studentRole->id,
                'student_number' => $data['student_number'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
            ]);

        });
    }

    public function updateStudent(Student $student, array $data): Student
    {
        return DB::transaction(function () use ($student, $data) {

            $this->userService->updateUser(
                $student->user,
                $data
            );

            $student->update([

                'student_number' => $data['student_number'],

                'first_name' => $data['first_name'],

                'last_name' => $data['last_name'],

            ]);

            return $student->fresh('user');

        });
    }

    public function deleteStudent(Student $student): void
    {
        DB::transaction(function () use ($student) {

            $user = $student->user;

            $student->delete();

            $this->userService->deleteUser($user);

        });
    }

    public function assignAdviser(
        Student $student,
        Adviser $adviser
    ): Student
    {
        $student->update([
            'adviser_id' => $adviser->id,
        ]);

        return $student->fresh('adviser');
    }

    public function getStudentByUserId(int $userId): Student
    {
        return Student::with([
            'user',
            'adviser',
        ])
        ->where('user_id', $userId)
        ->firstOrFail();
    }

    public function getDashboardStatistics(
        Student $student
    ): array
    {
        $attendances = $student->dailyAttendances();

        return [

            'total_attendance' => $attendances->count(),

            'pending_attendance' => $student
                ->dailyAttendances()
                ->where('status', 'Pending')
                ->count(),

            'approved_attendance' => $student
                ->dailyAttendances()
                ->where('status', 'Approved')
                ->count(),

            'approved_hours' => $student
                ->dailyAttendances()
                ->where('status', 'Approved')
                ->sum('hours_rendered'),

        ];
    }
}