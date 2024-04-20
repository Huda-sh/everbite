<?php

namespace App\Actions\Items;

use App\Models\Item;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteItemAction
{
    use asAction;

    public function handle($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
    }

    public function asController($id)
    {
        $this->handle($id);
        return back();
    }
}
