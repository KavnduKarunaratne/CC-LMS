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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('role_id')->default('1')->constrained('roles');
            $table->integer('admission_number')->nullable();
            $table->year('year_of_registration')->nullable();
            $table->string('password')->default('password');
            $table->integer('class_id')->constrained('classes')->nullable();
            $table->integer('grade_id')->constrained('grades')->nullable();
            


            $table->rememberToken();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
