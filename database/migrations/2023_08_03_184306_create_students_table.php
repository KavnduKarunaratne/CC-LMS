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
            $table->timestamps();
            $table->integer('admission_number')->nullable();
            $table->string('student_name')->nullable();
            $table->string('email')->unique();
            $table->year('year_of_registration')->nullable();
            $table->string('password')->default('password');
            
            $table->foreignId('class_id')->default('1')->constrained('classes');
            $table->foreignId('grade_id')->default('1')->constrained('grades');
           
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
