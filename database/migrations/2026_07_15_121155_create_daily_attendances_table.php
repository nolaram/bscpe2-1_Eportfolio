<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daily_attendances', function (Blueprint $table) {

            $table->id();

            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unique([
                'student_id',
                'attendance_date',
            ]);

            $table->boolean('has_lunch_break')->default(true);

            $table->date('attendance_date');

            $table->time('time_in');

            $table->time('time_out');

            $table->decimal('hours_rendered', 5, 2);

            $table->enum('status', [
                'Pending',
                'Approved',
                'Rejected',
                'Submitted'
            ])->default('Pending');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daily_attendances');
    }
};