<?php

namespace App\Actions\Categories;

use App\Models\Category;
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

        $categories = $user->categories->where('parent_id', null)->select(['id', 'name']);
        return $categories->toArray();
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
        return response()->json([
            'status'=>true,
            'data'=>['categories'=>$data]
        ], 200);
    }
}
