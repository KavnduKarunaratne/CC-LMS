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
        
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('assignment_name');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->datetime('due_date');
            $table->string('description');
            $table->string('file');
            $table->foreignId('teacher_id')->constrained('users')->nullable();
            $table->datetime('upload_date');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
