<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::create([
            'title' => 'From seeder',
            'content' => 'content seeder',
            'image' => 'image seeder',
            'user_id' => 1,
        ]);

        \App\Models\Blog::factory(50)->create();
    }
}
