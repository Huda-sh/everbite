<?php

namespace App\Actions\Items;

use App\Models\Category;
use App\Models\Item;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class GetItemsAction
{
    use asAction;

    public function handle($id)
    {
        return $items = Item::where('category_id', $id)->select(['id', 'name', 'ingredients', 'price'])->get()->toArray();
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
