<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeeklyReport extends Model
{
    protected $fillable = [
        'student_id',
        'week_number',
        'week_start',
        'week_end',
        'activities',
        'challenges',
        'skills_learned',
        'hours_rendered',
        'report_file',
        'status',
        'adviser_comment',
        'submitted_at',
    ];

    protected $casts = [
        'week_start' => 'date',
        'week_end' => 'date',
        'submitted_at' => 'datetime',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}