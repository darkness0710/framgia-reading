<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(UserPlansTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(RelationsTableSeeder::class);
        $this->call(PlanItemsTableSeeder::class);
        $this->call(UserPlanItemsTableSeeder::class);
        $this->call(SocialAccountsTableSeeder::class);    
    }
}
