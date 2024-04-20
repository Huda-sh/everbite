<?php

namespace App\Actions\Items;

use App\Models\Item;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class AddItemAction
{
    use asAction;

    public function handle($data, $id): void
    {
        Item::create([
            'name'=>$data['name'],
            'price'=>$data['price'],
            'ingredients'=>$data['ingredients'],
            'category_id'=>$id
        ]);
    }

    public function asController(ActionRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $this->handle($data, $id);
        return back();
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'price' => ['required', 'string'],
            'ingredients' => ['required', 'string'],
            'id'=>['integer']
        ];
    }
}
