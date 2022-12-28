<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('settings')->insert([
            [
                'name' => 'Phone',
                'code' => 'phone',
                'content' => '0998899989',
            ],
            [
                'name' => 'Email',
                'code' => 'email',
                'content' => 'test@gmail.com',
            ],
            [
                'name' => 'Address',
                'code' => 'address',
                'content' => 'Dubai, UAE',
            ],
            [
                'name' => 'Facebook',
                'code' => 'facebook_link',
                'content' => '',
            ],
            [
                'name' => 'Instagram',
                'code' => 'instagram_link',
                'content' => '',
            ],
            [
                'name' => 'Twitter',
                'code' => 'twitter_link',
                'content' => '',
            ],
        ]);
    }
}
