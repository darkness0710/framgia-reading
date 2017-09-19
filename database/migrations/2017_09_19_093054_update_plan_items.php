<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePlanItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_items', function (Blueprint $table) {
            $table->dropColumn('start_date');
            $table->dropColumn('due_date');
            $table->integer('duration');
        });

        Schema::table('user_plan_items', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['plan_item_id']);
            $table->unsignedInteger('book_id');
            $table->integer('duration');
            $table->datetime('start_date');
            $table->datetime('due_date');
            $table->string('note');
            $table->foreign('book_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_items', function (Blueprint $table) {
            $table->datetime('start_date');
            $table->datetime('due_date');
            $table->dropColumn('duration');
        });

        Schema::table('user_plan_items', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('plan_item_id');
            $table->dropColumn('book_id');
            $table->dropColumn('duration');
            $table->dropColumn('start_date');
            $table->dropColumn('due_date');
            $table->dropColumn('note');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
