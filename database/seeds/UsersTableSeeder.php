<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'account_name' => 'yamada',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
            ],
            [
                'account_name' => 'suzuki',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
            ],
            [
                'account_name' => 'sato',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
            ],
        ]);
    }
}
