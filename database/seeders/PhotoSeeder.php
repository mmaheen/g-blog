<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhotoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();

        $source_path = public_path('assets/frontend/assets/img/portfolio');
        $destination_path = public_path('uploads/photos');

        File::cleanDirectory($destination_path);
        File::copyDirectory($source_path,$destination_path);

        foreach(range(1,80) as $index){
            $photos = File::files($destination_path);
            $random_photo = $photos[array_rand($photos)];
            $photo_name = $random_photo->getFileName();

            Photo::create([
                'title' => $faker->sentence(5),
                'description'=>$faker->realText($maxNbChars = 450, $indexSize = 2),
                'image' => $photo_name,
                'category_id' => Category::inRandomOrder()->first()->id,
                'user_id' => User::inRandomOrder()->first()->id,
                'created_at' => $faker->dateTime()
            ]);
        }
    }
}
