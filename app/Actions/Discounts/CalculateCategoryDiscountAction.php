<?php

namespace App\Actions\Discounts;

use App\Models\Category;
use App\Models\Discount;
use App\Models\User;
use Lorisleiva\Actions\Concerns\AsAction;

class CalculateCategoryDiscountAction
{
    use asAction;

    public function handle($child)
    {
        $discount = Discount::where('discountable_id', $child->id)
            ->where('discountable_type', Category::class)
            ->first();

        if (!$discount && $child->parent) { // traversing over the ancestor chain as you would with Linked List search algorithm
            $parent = $child;
            while (!$discount && $parent->parent) {
                $parent = $parent->parent;
                $discount = Discount::where('discountable_id', $parent->id)
                    ->where('discountable_type', Category::class)
                    ->first();
            }
            if ($parent->user->discount){
                $discount = Discount::where('discountable_id', $parent->user->id)
                    ->where('discountable_type', User::class)
                    ->first();
            }
        }
        return $discount;
    }
}
