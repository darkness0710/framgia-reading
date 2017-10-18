<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'role' => 'member',
        'avatar' => 'default-avatar.jpg',
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'gender' =>  $faker->randomElement($array = array ('male', 'female')),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(5),
        'description' => $faker->text(20),
    ];
});

$factory->define(App\Models\Book::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(25),
        'description' => $faker->text(150),
        'author' => $faker->name,
        'speak' => 'English',
        'year' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'status' => $faker->randomElement($array = array ('1', '2')),
        'publisher' => $faker->company,
        'pages' => $faker->numberBetween(100, 1000),
        'cover' => 'book.jpg',
        'rate' => $faker->numberBetween(1, 5),
        'summary' => $faker->text(150),
    ];
});

$factory->define(App\Models\Review::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return App\Models\User::pluck('id')
                ->random(1)
                ->first();
        },
        'reviewable_id' =>  $faker->numberBetween(1, 10),
        'reviewable_type' => $faker->randomElement($array = array ('Book', 'Plan')),
        'content' => $faker->text(100),
        'rate' => $faker->numberBetween(1, 5),
    ];
});

$factory->define(App\Models\Plan::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(5),
        'description' => $faker->text(20),
        'subject_id' => function () {
            return App\Models\Subject::pluck('id')
                ->random(1)
                ->first();
        },
        'user_id' => function () {
            return App\Models\User::pluck('id')
                ->random(1)
                ->first();
        },
        'summary' => $faker->text(150),
        'rate' => $faker->numberBetween(1, 5),
    ];
});

$factory->define(App\Models\UserPlan::class, function (Faker\Generator $faker) {
    return [
        'assign_id' => function () {
            return App\Models\User::pluck('id')
                ->random(1)
                ->first();
        },
        'plan_id' => function () {
            return App\Models\Plan::pluck('id')
                ->random(1)
                ->first();
        },
        'start_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'due_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'status' => $faker->randomElement($array = array ('done', 'process')),
    ];
});

$factory->define(App\Models\Comment::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return App\Models\User::pluck('id')
                ->random(1)
                ->first();
        },
        'review_id' => function () {
            return App\Models\Review::pluck('id')
                ->random(1)
                ->first();
        },
        'content' => $faker->text(50),
    ];
});

$factory->define(App\Models\Subject::class, function (Faker\Generator $faker) {
    return [
        'cover' => 
            $faker->randomElement($array = array ('postgresql.jpg', 'java.jpg', 'ruby.jpg', 'react.jpg')),
        'title' => $faker->text(5),
        'description' => $faker->text(20),
        'trending' => $faker->numberBetween(0, 3),
    ];
});

$factory->define(App\Models\UserPlanItem::class, function (Faker\Generator $faker) {
    return [
        'user_plan_id' => function () {
            return App\Models\UserPlan::pluck('id')
                ->random(1)
                ->first();
        },
        'book_id' => function () {
            return App\Models\Book::pluck('id')
                ->random(1)
                ->first();
        },
        'duration' => $faker->numberBetween(1, 8), 
        'note' => $faker->text(10),
        'start_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'due_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'status' => $faker->randomElement($array = array ('done', 'process')),
    ];
});

$factory->define(App\Models\Relation::class, function (Faker\Generator $faker) {
    return [
        'follower_id' => $faker->numberBetween(1, 10),
        'following_id' => $faker->numberBetween(11, 30),
    ];
});

$factory->define(App\Models\PlanItem::class, function (Faker\Generator $faker) {
    return [
        'note' => $faker->text(150),
        'duration' => $faker->numberBetween(1, 8),
        'plan_id' => function () {
            return App\Models\Plan::pluck('id')
                ->random(1)
                ->first();
        },
        'book_id' => function () {
            return App\Models\Book::pluck('id')
                ->random(1)
                ->first();
        },
        'summary' => $faker->text(20),
    ];
});

$factory->define(App\Models\SocialAccount::class, function (Faker\Generator $faker) {
    return [
        'social_type' => $faker->randomElement($array = array ('facebook', 'github')),
        'social_id' => $faker->numberBetween(10000, 1000000),
        'user_id' => function () {
            return App\Models\User::pluck('id')
                ->random(1)
                ->first();
        },
    ];
});
