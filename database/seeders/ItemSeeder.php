<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leafs = [];

        $categories = $this->getLeafCategories();

        for ($i = 0; $i < 40; $i++) {
            Item::create([
                'name' => \fake()->word(),
                'ingredients' => \fake()->sentence(),
                'price' => \fake()->numberBetween(5, 50),
                'category_id' => $categories[array_rand($categories)]->id
            ]);
        }
    }

    function getLeafCategories($parent_id = null)
    {
        $leafCategories = [];
        $categories = Category::where('parent_id', $parent_id)->get();
        foreach ($categories as $category) {
            if ($category->children->isEmpty()) {
                $leafCategories[] = $category;
            } else {
                $leafCategories = array_merge($leafCategories, $this->getLeafCategories($category->id));
            }
        }
        return $leafCategories;
    }
}
