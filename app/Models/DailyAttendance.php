<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DailyAttendance extends Model
{
    protected $fillable = [

        'student_id',

        'attendance_date',

        'time_in',

        'time_out',

        'hours_rendered',

        'status',

    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}