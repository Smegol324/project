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
        Schema::table('sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('cinema_id');
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->foreign('cinema_id')->references('cinema_id')->on('cinema_has_films')->onDelete('cascade');
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('film_id');
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->foreign('film_id')->references('film_id')->on('cinema_has_films')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropForeign(['cinema_id']);
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropColumn('cinema_id');
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropForeign(['film_id']);
        });
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropColumn('film_id');
        });
    }
};
