<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // $table->foreignId('role_id')
            //         ->constrained()
            //         ->cascadeOnUpdate()
            //         ->restrictOnDelete();

            // $table->foreignId('adviser_id')
            //         ->nullable()
            //         ->constrained()
            //         ->cascadeOnUpdate()
            //         ->nullOnDelete();
            
            $table->foreignId('user_id')
                    ->constrained()
                    ->cascadeOnDelete();        

            $table->string('student_number')->unique();

            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');

            $table->string('contact_number')->nullable();
            $table->string('personal_email')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('ojt_start_date')->nullable();
            $table->string('ojt_end_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
