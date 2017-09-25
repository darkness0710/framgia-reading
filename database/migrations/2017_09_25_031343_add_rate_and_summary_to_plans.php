<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRateAndSummaryToPlans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->float('rate');
        });

        Schema::table('plan_items', function (Blueprint $table) {
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
            $table->dropColumn('rate');
        });

        Schema::table('plan_items', function (Blueprint $table) {
            $table->dropColumn('summary');
        });
    }
}
