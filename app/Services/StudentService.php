<?php

namespace App\Services;

use App\Models\Student;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Services\UserService;

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

            $user = $this->userService->create([
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
}