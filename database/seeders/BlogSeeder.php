<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'title' => 'Lorem Ipsum 1',
                'content' => 'Lorem Ipsum 1',
                'user_id' => 9,
            ],
            [
                'title' => 'Lorem Ipsum 2',
                'content' => 'Lorem Ipsum 2',
                'user_id' => 9,
            ],
            [
                'title' => 'Lorem Ipsum 3',
                'content' => 'Lorem Ipsum 3',
                'user_id' => 10,
            ],
            [
                'title' => 'Lorem Ipsum 4',
                'content' => 'Lorem Ipsum 4',
                'user_id' => 10,
            ]
        ]);
    }
}
