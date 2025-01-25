<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Hotels', 'Room Bookings', 'Travel Services', 'Offers & Discounts', 'Customer Reviews'];
        if (count($categories) > 0) {
            foreach ($categories as $category) {
                Category::create([
                    'name' => $category
                ]);
            };
        }
    }
}
