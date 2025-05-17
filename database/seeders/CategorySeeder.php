<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Factory::create();

        $categories = [
            "Animals","Mammals", "Birds", "Reptiles", "Amphibians", "Fish", "Insects",
            "Food","Fruits", "Vegetables", "Grains", "Dairy", "Meat", "Seafood", "Snacks",
            "Clothing","Tops", "Bottoms", "Dresses", "Outerwear", "Footwear", "Accessories",
            "Technology","Computers", "Smartphones", "Tablets", "Wearables", "Cameras",
            "Sports","Soccer", "Basketball", "Tennis", "Golf", "Swimming", "Running",
            "Movies","Action", "Comedy", "Drama", "Horror", "Sci-Fi", "Documentary",
            "Music", "Pop", "Rock", "Jazz", "Classical", "Hip-hop", "Country",
            "Education", "Preschool", "Elementary", "High School", "College", "Vocational Training",
            "Travel","Beach Destinations", "Mountain Destinations", "Urban Destinations", "Adventure Travel",
            "Books","Fiction", "Non-fiction", "Mystery", "Fantasy", "Biography", "Poetry",
            "Art","Painting", "Sculpture", "Photography", "Digital Art", "Street Art",
            "Hobbies","Gardening", "Cooking", "Painting", "Knitting", "Woodworking", "Gaming",
            "Health" ,"Exercise", "Nutrition", "Mental Health", "Preventive Care", "Chronic Conditions",
            "Home","Interior Design", "Furniture", "Appliances", "Kitchenware", "Bedding",
            "Industry","Automotive", "Aerospace", "Technology", "Healthcare", "Retail", "Finance",
            "People","Children", "Teenagers", "Adults", "Seniors", "Families", "Entrepreneurs",
            "University", "Faculties" , "Arts", "Humanities", "Engineering", "Business", "Law", "IT",
            "Drinks", "Water", "Tea", "Coffee", "Juice", "Soda", "Smoothies", "Alcoholic Beverages",
            "Jobs","Healthcare", "IT", "Education", "Finance", "Engineering", "Marketing"
        ];

        $source_path = public_path('assets/frontend/assets/img/clients');
        $destination_path = public_path('uploads/categories');

        File::cleanDirectory($destination_path);
        File::copyDirectory($source_path,$destination_path);

        foreach(range(1,20) as $index){
            $photos = File::files($destination_path);
            $random_photo = $photos[array_rand($photos)];
            $photo_name = $random_photo->getFileName();

            Category::create([
                'title' => $categories[array_rand($categories)],
                'image' => $photo_name,
                'user_id' => User::inRandomOrder()->first()->id,
                'created_at' =>$faker->dateTime()
            ]);
        }
    }
}
