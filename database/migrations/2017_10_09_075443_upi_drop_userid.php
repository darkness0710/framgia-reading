<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpiDropUserid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_plan_items', function (Blueprint $table) {
            if (Schema::hasColumn('user_plan_items', 'user_id')) {
                $table->dropColumn(['user_id']);
            }

            if (Schema::hasColumn('user_plan_items', 'plan_item_id')) {
                $table->dropColumn(['plan_item_id']);
            }
        });

        Schema::table('categories', function (Blueprint $table) {
            if (Schema::hasColumn('categories', 'cover')) {
                $table->dropColumn(['cover']);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_plan_items', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('plan_item_id');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('cover');
        });
    }
}
