<?php

use Illuminate\Database\Seeder;
use \Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Favorite',
                'created_at' => Carbon::now(),
            ],
            [
                'title' => 'News',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
