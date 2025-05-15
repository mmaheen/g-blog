<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        // Create 100 parent comments
        for ($i = 0; $i < 100; $i++) {
            $parentComment = Comment::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'blog_id' => Blog::inRandomOrder()->first()->id,
                'comment' => $faker->sentence(),
                'likes' => rand(0,999)
            ]);

            // Create 2 replies for each parent comment
            for ($j = 0; $j < 2; $j++) {
                Comment::create([
                    'user_id' => User::inRandomOrder()->first()->id,
                    'blog_id' => $parentComment->blog_id,
                    'parent_id' => $parentComment->id,
                    'comment' => $faker->sentence(),
                    'likes' => rand(0,999)
                ]);
            }
        }
    }
}
