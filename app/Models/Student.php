<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Adviser;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\DailyAttendance;
use App\Models\Document;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'adviser_id',
        'student_number',
        'first_name',
        'middle_name',
        'last_name',
        'contact_number',
        'personal_email',
        'profile_picture',
        'company_name',
        'company_address',
        'supervisor',
        'ojt_start_date',
        'ojt_end_date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function adviser()
    {
        return $this->belongsTo(Adviser::class);
    }

    public function dailyAttendances(): HasMany
    {
        return $this->hasMany(DailyAttendance::class);
    }

    public function weeklyReports(): HasMany
    {
        return $this->hasMany(WeeklyReport::class);
    }
    
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class);
    }
}