<?php
use App\Models\PlanItem;
use Illuminate\Database\Seeder;

class PlanItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PlanItem::class, 10)->create();
    }
}
