<?php
use App\Models\UserPlan;
use Illuminate\Database\Seeder;

class UserPlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserPlan::class, 10)->create();
    }
}
