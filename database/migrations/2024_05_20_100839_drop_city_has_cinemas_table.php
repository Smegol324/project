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
        Schema::dropIfExists('city_has_cinemas');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('city_has_cinemas', function (Blueprint $table) {
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('cinema_id');
            $table->primary(['city_id', 'cinema_id']);
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('cinema_id')->references('id')->on('cinemas')->onDelete('cascade');
        });
    }
};
