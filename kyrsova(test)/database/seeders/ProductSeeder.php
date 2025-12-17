<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mountain = Category::where('name', 'Mountain Bikes')->first();
        $road = Category::where('name', 'Road Bikes')->first();
        $hybrid = Category::where('name', 'Hybrid Bikes')->first();
        $electric = Category::where('name', 'Electric Bikes')->first();
        $kids = Category::where('name', 'Kids Bikes')->first();
        $accessories = Category::where('name', 'Accessories')->first();

        Product::create([
            'name' => 'Trek Marlin 5',
            'description' => 'Affordable mountain bike for beginners',
            'price' => 599.99,
            'category_id' => $mountain->id,
            'image' => 'trek-marlin-5.jpg'
        ]);

        Product::create([
            'name' => 'Giant Defy Advanced',
            'description' => 'High-performance road bike',
            'price' => 1299.99,
            'category_id' => $road->id,
            'image' => 'giant-defy.jpg'
        ]);

        Product::create([
            'name' => 'Cannondale Synapse',
            'description' => 'Comfortable hybrid bike for daily commuting',
            'price' => 899.99,
            'category_id' => $hybrid->id,
            'image' => 'cannondale-synapse.jpg'
        ]);

        Product::create([
            'name' => 'Rad Power Bikes RadCity',
            'description' => 'Electric bike for urban riding',
            'price' => 1499.99,
            'category_id' => $electric->id,
            'image' => 'rad-power-radcity.jpg'
        ]);

        Product::create([
            'name' => 'Huffy Cranbrook Cruiser',
            'description' => 'Fun kids bike with training wheels',
            'price' => 149.99,
            'category_id' => $kids->id,
            'image' => 'huffy-cranbrook.jpg'
        ]);

        Product::create([
            'name' => 'Bell Star MIPS Helmet',
            'description' => 'Safety helmet for mountain biking',
            'price' => 79.99,
            'category_id' => $accessories->id,
            'image' => 'bell-star-helmet.jpg'
        ]);

        Product::create([
            'name' => 'Kryptonite U-Lock',
            'description' => 'Secure bike lock',
            'price' => 49.99,
            'category_id' => $accessories->id,
            'image' => 'kryptonite-ulock.jpg'
        ]);
    }
}
