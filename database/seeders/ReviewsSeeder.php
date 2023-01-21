<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('comments')->insert([
            [
                'commenter_id' => User::query()->first()->id,
                'commenter_type' => User::class,
                'commentable_type' => Blog::class,
                'commentable_id' => Blog::query()->first()->id,
                'comment' => 'Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis ad. In vim mucius menandri convenire, an brute zril vis. Ancillae delectus necessitatibus no eam, at porro solet veniam mel, ad everti nostrud vim. Eam no menandri pertinacia deterruisset.',
                'rate' => 5
            ],
            [
                'commenter_id' => User::query()->first()->id,
                'commenter_type' => User::class,
                'commentable_type' => Blog::class,
                'commentable_id' => Blog::query()->first()->id,
                'comment' => 'Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis ad. In vim mucius menandri convenire, an brute zril vis. Ancillae delectus necessitatibus no eam, at porro solet veniam mel, ad everti nostrud vim. Eam no menandri pertinacia deterruisset.',
                'rate' => 3
            ],
            [
                'commenter_id' => User::query()->first()->id,
                'commenter_type' => User::class,
                'commentable_type' => Blog::class,
                'commentable_id' => Blog::query()->first()->id,
                'comment' => 'Lorem ipsum dolor sit amet, dolores mandamus moderatius ea ius, sed civibus vivendum imperdiet ei, amet tritani sea id. Ut veri diceret fierent mei, qui facilisi suavitate euripidis ad. In vim mucius menandri convenire, an brute zril vis. Ancillae delectus necessitatibus no eam, at porro solet veniam mel, ad everti nostrud vim. Eam no menandri pertinacia deterruisset.',
                'rate' => 3
            ],
        ]);
    }
}
