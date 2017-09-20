<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LastMigrateAddDateToUserPlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('start_date');
            $table->dropColumn('due_date');
        });

        Schema::table('user_plans', function (Blueprint $table) {
            $table->datetime('start_date');
            $table->datetime('due_date');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->string('summary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->datetime('start_date');
            $table->datetime('due_date');
        });

        Schema::table('user_plans', function (Blueprint $table) {
            $table->dropColumn('start_date');
            $table->dropColumn('due_date');
        });

        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('summary');
        });
    }
}
