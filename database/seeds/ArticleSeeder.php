<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'subject' => 'My first blog post!',
                'body' => 'Lorem ipsum dolor sit amet',
                'created_at' => Carbon::now(),
            ],
            [
                'subject' => 'New Article',
                'body' => 'Lorem ipsum dolor sit amet',
                'created_at' => Carbon::now(),
            ],
            [
                'subject' => 'another New Article',
                'body' => 'Lorem ipsum dolor sit amet',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
