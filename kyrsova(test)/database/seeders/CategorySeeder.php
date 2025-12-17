<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Mountain Bikes', 'description' => 'Bikes for off-road adventures']);
        Category::create(['name' => 'Road Bikes', 'description' => 'High-speed bikes for paved roads']);
        Category::create(['name' => 'Hybrid Bikes', 'description' => 'Versatile bikes for city and light trails']);
        Category::create(['name' => 'Electric Bikes', 'description' => 'Assisted electric bikes for easy riding']);
        Category::create(['name' => 'Kids Bikes', 'description' => 'Bikes designed for children']);
        Category::create(['name' => 'Accessories', 'description' => 'Bike accessories like helmets, locks, and lights']);
    }
}
