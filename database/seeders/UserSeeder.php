<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();
        
        $source_path = public_path('assets/frontend/assets/img/person');
        $destination_path = public_path('uploads/users');

        File::cleanDirectory($destination_path);
        File::copyDirectory($source_path,$destination_path);

        $role = ['admin','client'];

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@test.com',
            'password' => '0',
            'role' => 'admin',
            'image' => 'person-f-8.webp'
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@test.com',
            'password' => '0',
            'role' => 'client',
            'image' => 'person-m-7.webp'
        ]);

        foreach(range(1,20) as $index){
            $photos = File::files($destination_path);
            $random_photo = $photos[array_rand($photos)];
            $photo_name = $random_photo->getFileName(); 
            
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->password,
                'role' => $role[array_rand($role)],
                'image' => $photo_name,
            ]);
        }
    }
}
