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
		factory(App\User::class,1)->create();
		$user = App\User::first();
		$user->username = 'admin';
		$user->save();
        // $this->call(UsersTableSeeder::class);
    }
}
