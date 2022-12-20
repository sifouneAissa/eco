<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        // admin
        DB::table('users')->insert([
            [
                'name' => 'admin admin',
                'email' => 'admin@demo.com',
                'password' => Hash::make('password'),
                'is_admin' => true
            ]
        ]);
    }
}
