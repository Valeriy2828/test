<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(UsersTableSeeder::class);
		 factory(\App\Models\Customer::class, 10001)->create();
		 factory(\App\Models\Firm::class, 100001)->create();
    }
}
