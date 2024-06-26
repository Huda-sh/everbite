<?php

namespace App\Actions\Categories;

use App\Actions\Discounts\CalculateCategoryDiscountAction;
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
            $child->discount = CalculateCategoryDiscountAction::run($child);
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
