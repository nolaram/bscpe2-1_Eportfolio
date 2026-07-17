<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    protected $fillable = [

        'student_id',

        'category',

        'document_name',

        'file_path',

        'status',

        'uploaded_at',

    ];

    protected $casts = [

        'uploaded_at' => 'datetime',

    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}