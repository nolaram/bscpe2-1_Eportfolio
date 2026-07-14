<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'user_id',
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
   
}