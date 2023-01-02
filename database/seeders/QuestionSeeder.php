<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('questions')->insert([
            [
                'question' => 'Where’s My Order?',
                'answer' => 'Order id'
            ],
            [
                'question' => 'What is your company about?',
                'answer' => 'E-cover-data'
            ],
            [
                'question' => 'What is your product or service?',
                'answer' => 'We sell all types of products you want go to the search bar and enjoy.'
            ],
            [
                'question' => 'Do You Offer Any Discounts or Coupons?',
                'answer' => 'No not, yet'
            ],
        ]);

    }
}
