<?php
use App\Models\SocialAccount;
use Illuminate\Database\Seeder;

class SocialAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SocialAccount::class, 10)->create();
    }
}
