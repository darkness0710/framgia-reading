<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('social_accounts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->foreign('plan_id')->references('id')->on('plans')->change();
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->change();
            $table->foreign('plan_id')->references('id')->on('plans')->change();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('review_id')->references('id')->on('reviews')->change();
            $table->foreign('user_id')->references('id')->on('users')->change();
        });

        Schema::table('user_plans', function (Blueprint $table) {
            $table->foreign('assign_id')->references('id')->on('users')->change();
            $table->foreign('plan_id')->references('id')->on('plans')->change();
        });

        Schema::table('user_plan_items', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('plan_item_id')->references('id')->on('plan_items')->change();
            $table->foreign('user_plan_id')->references('id')->on('user_plans')->change();
        });

        Schema::table('plan_items', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books')->change();
            $table->foreign('plan_id')->references('id')->on('plans')->change();
        });

        Schema::table('book_category', function (Blueprint $table) {
            $table->foreign('book_id')->references('id')->on('books')->change();
            $table->foreign('category_id')->references('id')->on('categories')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
