<?php

namespace App\Actions\Discounts;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Item;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class CalculateItemDiscountAction
{
    use asAction;

    public function handle($item, $category)
    {
        $discount = Discount::where('discountable_id', $item->id)
            ->where('discountable_type', Item::class)
            ->first();
        if (!$discount && $category) {
            $category_temp = $category;
            while (!$discount && $category_temp->parent_id) {
                $category_temp = Category::find($category_temp->parent_id);
                $discount = Discount::where('discountable_id', $category_temp->id)
                    ->where('discountable_type', Category::class)
                    ->first();
            }
            if ($category_temp->user->discount){
                $discount = Discount::where('discountable_id', $category_temp->user->id)
                    ->where('discountable_type', User::class)
                    ->first();
            }
        }

        return $discount?->discount;
    }
}
