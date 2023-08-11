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
       
        Schema::create('submission', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('submission_name');
            $table->string('submission_file');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->foreignId('student_id')->constrained('users');
            $table->foreignId('assignment_id')->constrained('assignments');
            $table->datetime('uploaded_date');
            $table->string('description');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submission');
    }
};
