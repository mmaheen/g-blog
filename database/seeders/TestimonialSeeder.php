<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();

        foreach(range(1,30) as $index){
            Testimonial::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'review' => $faker->sentence(),
                'rating' => rand(1,5)
            ]);
        }
    }
}
