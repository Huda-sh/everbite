<?php

namespace App\Actions\Items;

use App\Models\Category;
use App\Models\Item;
use Inertia\Inertia;
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

    public function htmlResponse(Array $data): \Inertia\Response
    {
        return Inertia::render('MenuItems', ['items'=>$data]);
    }

    public function jsonResponse(Array $data)
    {
        return response()->json([
            'status'=>true,
            'data'=>['items'=>$data]
        ], 200);
    }
}
