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
   
    public function getAllStudents(
        ?string $search = null,
        ?int $adviserId = null
    ): LengthAwarePaginator
    {
        return Student::with([
                'user',
                'adviser',
                'dailyAttendances',
            ])
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('student_number', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%");

                });

            })
            ->when($adviserId, function ($query) use ($adviserId) {

                $query->where('adviser_id', $adviserId);

            })
            ->orderBy('student_number')
            ->paginate(10)
            ->withQueryString();
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

    public function getDashboardStatistics(Student $student): array
    {
        $attendances = $student->dailyAttendances();

        $totalHours = (clone $attendances)
            ->sum('hours_rendered');

        $requiredHours = 300;

        return [

            'total_attendance' => (clone $attendances)->count(),

            'total_hours' => $totalHours,

            'required_hours' => $requiredHours,

            'remaining_hours' => max(
                0,
                $requiredHours - $totalHours
            ),

            'progress_percentage' => min(
                100,
                round(($totalHours / $requiredHours) * 100, 1)
            ),

        ];
    }

    public function getStudent(Student $student): Student
    {
        return $student->load([
            'user',
            'adviser',
            'dailyAttendances',
        ]);
    }
}