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
        Schema::create('annoucements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('announcement');
            $table->date('date_of_announcement');

            $table->foreignId('management_id')->references('id')->on('management');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annnoucements');
    }
};
