<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            Discount::create([
                'discountable_type'=>Category::class,
                'discountable_id'=>rand(1, 30),
                'discount'=>rand(5, 20)
            ]);
        }
    }
}
