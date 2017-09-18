<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTimestamp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('timestamp');
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->string('timestamp');
        });
        Schema::table('book_category', function (Blueprint $table) {
            $table->string('timestamp');
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
            $table->dropColumn('timestamp');
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('timestamp');
        });
        Schema::table('book_category', function (Blueprint $table) {
            $table->dropColumn('timestamp');
        });
    }
}
