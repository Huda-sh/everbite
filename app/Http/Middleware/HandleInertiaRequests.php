<?php

namespace App\Http\Middleware;

use App\Actions\Categories\GetCategoryAncestors;
use App\Models\Category;
use App\Models\Discount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {

        $isAuth = false;
        $user = Auth::user();

        if ($request->route()->methods[0] == "DELETE" || $request->route()->methods[0] == "POST")
            return [];


        $isOwner = false;
        $id = $request->route()->parameter('id');
        $name = $request->route()->getName();
        $owner = $user;
        if ($user) {
            if ($name == "dashboard" || $name == 'home') {
                $isOwner = true;
            }

            else if ($name == "restaurant" && User::find($id)->id == $user->id) {
                $isOwner = true;
            }
            else if (($name == "category.show" || $name == "item.index") && Category::find($id)->user_id == $user->id) {
                $isOwner = true;
            }
            $isAuth = true;
        }
        if ($name == "restaurant") $owner = User::find($id);
        if ($name == "category.show" || $name == "item.index") $owner = Category::find($id)->user;
        $category_path = GetCategoryAncestors::run($name != "restaurant" && $name != "dashboard" ? $id : null);
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => [
                    'id' => $owner?->id,
                    'name' => $owner?->name,
                    'location' => $owner?->location,
                    'phone_number' => $owner?->phone_number,
                    'is_owner' => $isOwner,
                    'is_authenticated' => $isAuth
                ]
            ],
            'category_path' => $category_path
        ]);
    }
}
