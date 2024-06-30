<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(20)->create();
        $tags = Tag::factory(40)->create();
        $posts = Post::factory(200)->create();

        foreach ($posts as $post) {
            $tagsId = $tags->random(rand(1, 10))->pluck('id');
            $post->tags()->attach($tagsId);
        }
    }
}
