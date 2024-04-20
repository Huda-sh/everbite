<?php

namespace App\Actions\Restaurants;

use App\Models\User;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class BrowseRestaurantAction
{
    use asAction;

    public function handle($search)
    {

        return User::select(['id', 'name', 'location', 'phone_number'])->get();
    }

    public function asController()
    {
        return $this->handle();
    }

    public function htmlResponse($data)
    {
        return Inertia::render('Home', ['restaurants'=>$data]);
    }
    public function jsonResponse($data)
    {
        return response()->json([
            'status'=>true,
            'data'=>$data,
        ]);
    }
}
