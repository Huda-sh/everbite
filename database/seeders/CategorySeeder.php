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

        for ($i = 0; $i < 5; $i++) {
            Category::create([
                'name'=>fake()->word(),
                'user_id'=>1,
            ]);
        }

        for ($j = 0; $j < 20; $j++) {
            Category::create([
                'name'=>fake()->word(),
                'user_id'=>1,
                'parent_id'=>rand(1, 5)
            ]);
        }
    }
}
