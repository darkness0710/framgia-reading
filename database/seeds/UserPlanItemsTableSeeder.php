<?php
use App\Models\UserPlanItem;
use Illuminate\Database\Seeder;

class UserPlanItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserPlanItem::class, 10)->create();
    }
}
