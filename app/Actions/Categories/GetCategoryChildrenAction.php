<?php

namespace App\Actions\Categories;

use App\Models\Category;
use App\Models\Discount;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetCategoryChildrenAction
{

    use asAction;

    public function handle($id) :  array
    {
        // get the first level categories of a restaurant
        $category = Category::findOrFail($id);
        $children = $category->children;

        foreach ($children as $child) {
            // iterating over the children to calculate the discount of each child
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
            $child->discount = $discount ? $discount->discount : null;
        }
        return $children->select(['id', 'name', 'discount'])->toArray();
    }

    public function asController($id): array
    {
        return $this->handle($id);
    }
    public function htmlResponse(Array $data, ActionRequest $request)
    {
        if ($data == []) return redirect()->intended('/item/'.$request->route()->parameter('id'));
        return Inertia::render('Categories', ['categories'=>$data, 'id'=>$request->route()->parameter('id')]);
    }

    public function jsonResponse(Array $data, ActionRequest $request)
    {
        if ($data == []) return redirect()->intended('/item/'.$request->route()->parameter('id'));
        return response()->json([
            'status'=>true,
            'data'=>['categories'=>$data, 'id'=>$request->route()->parameter('id')]
        ], 200);
    }
}
