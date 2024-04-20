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

class GetRestaurantSuperCategories
{

    use asAction;

    public function handle(User $user) :  array
    {
        // get the first level categories of a restaurant
        $categories = $user->categories->where('parent_id', null)->load('discount')->select(['id', 'name', 'discount'])->toArray();
        $discount = Discount::where('discountable_id', $user->id)
            ->where('discountable_type', User::class)
            ->first();
        if ($discount){
            foreach ($categories as $key => $category) {
                if (!array_key_exists('discount', $category))
                    $categories[$key]['discount'] = $discount->discount;
                else
                    $categories[$key]['discount'] = $category['discount']['discount'];
            }
        }
        return $categories;
    }

    public function asController($id = null): array
    {
        $user = null;
        if(!$id && Auth::check()){
            $user = Auth::user();
        }
        else{
            $user = User::findOrFail($id);
        }
        return $this->handle($user);
    }
    public function htmlResponse(Array $data)
    {
        return Inertia::render('Categories', ['categories'=>$data]);
    }

    public function jsonResponse(Array $data)
    {
        $category = Category::find($data[0]['id']);
        return response()->json([
            'status'=>true,
            'data'=>[
                'categories'=>$data,
                'restaurant'=>User::find($category->user_id)
            ]
        ], 200);
    }
}
