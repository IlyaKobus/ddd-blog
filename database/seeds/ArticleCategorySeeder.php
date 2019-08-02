<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('article_category')->insert([
            [
                'article_id' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'article_id' => 1,
                'category_id' => 2,
                'created_at' => Carbon::now(),
            ],
            [
                'article_id' => 2,
                'category_id' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'article_id' => 3,
                'category_id' => 2,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
