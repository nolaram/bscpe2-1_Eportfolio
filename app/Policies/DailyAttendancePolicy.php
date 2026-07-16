<?php

namespace App\Policies;

use App\Models\DailyAttendance;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DailyAttendancePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, DailyAttendance $dailyAttendance): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(
        User $user,
        DailyAttendance $dailyAttendance
    ): bool
    {
        return
            $dailyAttendance->student->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(
        User $user,
        DailyAttendance $dailyAttendance
    ): bool
    {
        return
            $dailyAttendance->student->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, DailyAttendance $dailyAttendance): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, DailyAttendance $dailyAttendance): bool
    {
        return false;
    }
}
