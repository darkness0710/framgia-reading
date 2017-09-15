<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSoftDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('relations', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('social_accounts', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('user_plans', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('user_plan_items', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('plan_items', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('books', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('book_category', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('relations', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('social_accounts', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('plans', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('user_plans', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('user_plan_items', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('plan_items', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('books', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('categories', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::table('book_category', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
