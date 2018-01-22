<?php

use Illuminate\Database\Seeder;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Post::create(
            [
                'title' => 'Blog Post',
                'text' => 'Article Text Article Text Article Text'
            ]);
//         $this->call(PostsTableSeeder::class);
    }
}
