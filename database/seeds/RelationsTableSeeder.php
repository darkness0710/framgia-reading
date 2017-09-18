<?php
use App\Models\Relation;
use Illuminate\Database\Seeder;

class RelationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Relation::class, 3)->create();
    }
}
