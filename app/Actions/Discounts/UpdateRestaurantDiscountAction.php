<?php

namespace App\Actions\Discounts;

use App\Models\Discount;
use App\Models\User;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateRestaurantDiscountAction
{
    use asAction;

    public function handle($data, $id)
    {
        Discount::updateOrCreate(
            [
                'discountable_id' => $id,
                'discountable_type' => User::class
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
