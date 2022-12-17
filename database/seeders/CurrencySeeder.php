<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('currencies')->insert([
            [
                'name' => 'Dinar',
                'currency_code' => 'DZD',
                'exchange_rate' => 1,
                'code' => 'dzd',
                'status' => 1
            ],
            [
                'name' => 'Dollar',
                'currency_code' => '$',
                'exchange_rate' => 137.29,
                'code' => 'dollar',
                'status' => 1
            ],
            [
                'name' => 'Euro',
                'currency_code' => '€',
                'exchange_rate' => 145.46,
                'code' => 'euro',
                'status' => 1
            ]
        ]);
    }
}
