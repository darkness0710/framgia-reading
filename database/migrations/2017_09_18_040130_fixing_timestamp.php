<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixingTimestamp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('timestamp');
            $table->timestamps();
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('timestamp');
            $table->timestamps();
        });
        Schema::table('book_category', function (Blueprint $table) {
            $table->dropColumn('timestamp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropTimestamps();
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropTimestamps();
        });
        Schema::table('book_category', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
