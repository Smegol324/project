<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (Schema::hasColumn('films', 'dateEnd')) {
            Schema::table('films', function (Blueprint $table) {
                $table->dropColumn('dateEnd');
            });
        }
        Schema::table('films', function (Blueprint $table) {
            $table->string('image')->change();
        });
        Schema::table('films', function (Blueprint $table) {
            $table->time('length')->change();
        });


        Schema::table('films', function (Blueprint $table) {
            $table->date('dateAdd')->after('dateStart');
        });

        DB::statement('UPDATE films SET dateAdd = dateStart');

        Schema::table('films', function (Blueprint $table) {
            $table->dropColumn('dateStart');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('films', function (Blueprint $table) {
            $table->dateTime('dateEnd')->nullable();
        });
        Schema::table('films', function (Blueprint $table) {
            $table->date('dateStart')->after('dateAdd');
        });

        DB::statement('UPDATE films SET dateStart = dateAdd');

        Schema::table('films', function (Blueprint $table) {
            $table->dropColumn('dateAdd');
        });
        Schema::table('films', function (Blueprint $table) {
            $table->text('image')->change();
        });
        Schema::table('films', function (Blueprint $table) {
            $table->integer('length')->change();
        });
    }
};
