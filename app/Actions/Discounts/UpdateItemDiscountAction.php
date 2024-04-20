<?php

namespace App\Actions\Discounts;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Item;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateItemDiscountAction
{
    use asAction;

    public function handle($data, $id)
    {
        Discount::updateOrCreate(
            [
                'discountable_id' => $id,
                'discountable_type' => Item::class
            ],
            [
                'discount' => $data['discount']
            ]
        );
    }

    public function rules()
    {
        return [
            'discount'=>['required'],
        ];
    }

    public function asController(ActionRequest $request, $id)
    {
        $data = $request->validated();
        $this->handle($data, $id);
        return back();
    }
}
