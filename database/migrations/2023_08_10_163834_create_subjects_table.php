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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('subject_name');
            $table->foreignId('grade_id')->constrained('grades');
            $table->foreignId('class_id')->constrained('classes');
            $table->foreignId('teacher_id')->constrained('users')->nullable()->ondelete('cascade');

            $table->unique(['subject_name', 'class_id']);
          
        

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
