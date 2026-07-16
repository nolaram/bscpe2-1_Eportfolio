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

        'has_lunch_break',

        'hours_rendered',

        'status',

    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    protected function casts(): array
    {
        return [
            'attendance_date' => 'date',
            'time_in' => 'datetime:H:i',
            'time_out' => 'datetime:H:i',
        ];
    }

    public function getTimeInAttribute($value)
    {
        return substr($value, 0, 5);
    }

    public function getTimeOutAttribute($value)
    {
        return substr($value, 0, 5);
    }
}