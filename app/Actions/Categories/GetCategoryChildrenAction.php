<?php

namespace App\Actions\Categories;

use App\Models\Category;
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
        $children = $category->children->select(['id', 'name']);
        return $children->toArray();
    }

    public function asController($id): array
    {
        return $this->handle($id);
    }
    public function htmlResponse(Array $data, ActionRequest $request)
    {
        if ($data == []) return redirect()->intended('/item/'.$request->route()->parameter('id'));
        return Inertia::render('Categories', ['categories'=>$data]);
    }

    public function jsonResponse(Array $data, ActionRequest $request)
    {
        if ($data == []) return redirect()->intended('/item/'.$request->route()->parameter('id'));
        return response()->json([
            'status'=>true,
            'data'=>['categories'=>$data]
        ], 200);
    }
}
