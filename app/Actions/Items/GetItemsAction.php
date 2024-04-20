<?php

namespace App\Actions\Items;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Item;
use App\Models\User;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetItemsAction
{
    use asAction;

    public function handle($id)
    {
        $items = Item::where('category_id', $id)->with('category')->select(['id', 'name', 'ingredients', 'price'])->get();
        $category = Category::find($id);
        foreach ($items as $item) {
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

            $item->discount = $discount ? $discount->discount : null;
            if ($item->discount) {
                $item->after_discount = round($item->price - ($item->price * ($item->discount / 100)), 5);
            } else {
                $item->after_discount = $item->price;
            }
        }
        return $items->toArray();
    }

    public function asController($id): array
    {
        return $this->handle($id);
    }

    public function htmlResponse(Array $data, ActionRequest $request): \Inertia\Response
    {
        return Inertia::render('MenuItems', ['items'=>$data, 'id'=>$request->route()->parameter('id')]);
    }

    public function jsonResponse(Array $data, ActionRequest $request)
    {
        return response()->json([
            'status'=>true,
            'data'=>['items'=>$data, 'id'=>$request->route()->parameter('id')]
        ], 200);
    }
}
