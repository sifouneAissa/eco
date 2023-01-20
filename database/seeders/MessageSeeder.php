<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_messages')->insert([
            [
                'message' => 'Pellentesque semper ex diam, at tristique ipsum varius sed. Pellentesque non metus ullamcorper',
                'email' => 'email@demo.com',
                'name' => 'Ashly Briggs',
                'phone' => '0111111111'
            ],
            [
                'message' => 'Pellentesque semper ex diam, at tristique ipsum varius sed. Pellentesque non metus ullamcorper',
                'email' => 'email2@demo.com',
                'name' => 'Carl Jenkins',
                'phone' => '0333333333'
            ],[
                'message' => 'Pellentesque semper ex diam, at tristique ipsum varius sed. Pellentesque non metus ullamcorper',
                'email' => 'email3@demo.com',
                'name' => 'Bertha Martin',
                'phone' => '01222222222'
            ]
        ]);
    }
}
