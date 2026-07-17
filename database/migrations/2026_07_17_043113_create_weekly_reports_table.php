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
        Schema::create('weekly_reports', function (Blueprint $table) {

            $table->id();

            $table->foreignId('student_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('week_number');

            $table->date('week_start');

            $table->date('week_end');

            $table->longText('activities');

            $table->longText('challenges')->nullable();

            $table->longText('skills_learned')->nullable();

            $table->decimal('hours_rendered', 5, 2);

            $table->string('report_file')->nullable();

            $table->enum('status', [
                'Draft',
                'Submitted',
                'Approved',
                'Rejected'
            ])->default('Draft');

            $table->text('adviser_comment')->nullable();

            $table->timestamp('submitted_at')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_reports');
    }
};
