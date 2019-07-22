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
                'email' => 'yamada@example.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
            ],
            [
                'account_name' => 'suzuki',
                'email' => 'suzuki@example.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
            ],
            [
                'account_name' => 'sato',
                'email' => 'sato@example.com',
                'password' => Hash::make('password'),
                'remember_token' => str_random(10),
            ],
        ]);
    }
}
