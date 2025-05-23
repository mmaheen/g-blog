<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();

        $categories = [
            "Animals","Mammals", "Birds", "Reptiles", "Amphibians", "Fish", "Insects",
            "Food","Fruits", "Vegetables", "Grains", "Dairy", "Meat", "Seafood", "Snacks",
            "Clothing","Tops", "Bottoms", "Dresses", "Outerwear", "Footwear", "Accessories",
            "Technology","Computers", "Smartphones", "Tablets", "Wearables", "Cameras",
            "Sports","Soccer", "Basketball", "Tennis", "Golf", "Swimming", "Running",
            "Movies","Action", "Comedy", "Drama", "Horror", "Sci-Fi", "Documentary",
            "Music", "Pop", "Rock", "Jazz", "Classical", "Hip-hop", "Country",
            "Preschool", "Elementary", "High School", "College", "Vocational Training",
            "Travel","Beach Destinations", "Mountain Destinations", "Urban Destinations", "Adventure Travel",
            "Books","Fiction", "Non-fiction", "Mystery", "Fantasy", "Biography", "Poetry",
            "Art","Painting", "Sculpture", "Photography", "Digital Art", "Street Art",
            "Hobbies","Gardening", "Cooking", "Knitting", "Woodworking", "Gaming",
            "Health" ,"Exercise", "Nutrition", "Mental Health", "Preventive Care", "Chronic Conditions",
            "Home","Interior Design", "Furniture", "Appliances", "Kitchenware", "Bedding",
            "Industry","Automotive", "Aerospace", "Healthcare", "Retail", "Manufacturing",
            "People","Children", "Teenagers", "Adults", "Seniors", "Families", "Entrepreneurs",
            "University", "Faculties" , "Arts", "Humanities", "Business", "Law", "IT",
            "Drinks", "Water", "Tea", "Coffee", "Juice", "Soda", "Smoothies", "Alcoholic Beverages",
            "Jobs", "Education", "Finance", "Engineering", "Marketing"
        ];

        $source_path = public_path('assets/frontend/assets/img/clients');
        $destination_path = public_path('uploads/categories');

        File::cleanDirectory($destination_path);
        File::copyDirectory($source_path,$destination_path);

        foreach($categories as $category) {
            $photos = File::files($destination_path);
            $random_photo = $photos[array_rand($photos)];
            $photo_name = $random_photo->getFileName();

            Category::create([
                'title' => $category,
                'slug' => \Illuminate\Support\Str::slug($category),
                'image' => $photo_name,
                'user_id' => User::inRandomOrder()->first()->id,
                'created_at' =>$faker->dateTime()
            ]);
        }
    }
}
