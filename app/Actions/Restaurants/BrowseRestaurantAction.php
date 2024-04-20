<?php

namespace App\Actions\Restaurants;

use App\Models\User;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class BrowseRestaurantAction
{
    use asAction;

    public function handle($search)
    {

        return User::whereAny(['name', 'location'],'like', "%".$search."%")->select(['id', 'name', 'location', 'phone_number'])->get();
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle($request->search);
    }

    public function jsonResponse($data)
    {
        return response()->json([
            'status'=>true,
            'data'=>$data,
        ]);
    }
}
