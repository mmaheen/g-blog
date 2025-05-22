<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();

        $source_path = public_path('assets/frontend/assets/img/blog');
        $destination_path = public_path('uploads/blogs');

        File::cleanDirectory($destination_path);
        File::copyDirectory($source_path,$destination_path);

        foreach(range(1,80) as $index){
            $photos = File::files($destination_path);
            $random_photo = $photos[array_rand($photos)];
            $photo_name = $random_photo->getFileName();

            Blog::create([
                'title' => $faker->realText($maxNbChars = 100, $indexSize = 2),
                'description'=>$faker->realText($maxNbChars = 2000, $indexSize = 2),
                'image' => $photo_name,
                'user_id' =>  User::inRandomOrder()->first()->id,
                'category_id' => Category::inRandomOrder()->first()->id,
                'created_at' => $faker->dateTime()
            ]);
        }
    }
}
