<?php

use Illuminate\Database\Seeder;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_details')->insert([
            [
                'user_id' => '1',
                'display_name' => '山田',
                'status' => '99',
                'profile_text' => 'よろしくお願いします。',
                'profile_image' => '未設定',
            ],
            [
                'user_id' => '2',
                'display_name' => '鈴木',
                'status' => '99',
                'profile_text' => 'よろしくお願いします。',
                'profile_image' => '未設定',
            ],
            [
                'user_id' => '3',
                'display_name' => '佐藤',
                'status' => '99',
                'profile_text' => 'よろしくお願いします。',
                'profile_image' => '未設定',
            ],
        ]);
    }
}
