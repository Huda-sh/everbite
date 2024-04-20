<?php

namespace App\Actions\Categories;

use App\Models\Category;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCategoryAncestors
{
    use asAction;

    public function handle($current_category)
    {
        $category_path = [];
        if (!$current_category) {
            $category_path = [];
        } else {
            $category = Category::findOrFail($current_category);
            while ($category) {
                $category_path[] = ['id' => $category->id, 'name' => $category->name];
                $category = $category->parent;
            }
        }
        return array_reverse($category_path);
    }
}
