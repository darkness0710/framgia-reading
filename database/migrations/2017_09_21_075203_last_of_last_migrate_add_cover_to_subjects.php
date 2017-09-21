<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LastOfLastMigrateAddCoverToSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->string('cover');
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->unsignedInteger('subject_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('cover');
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('subject_id');
        });
    }
}
