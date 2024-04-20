<?php

namespace App\Http\Middleware;

use App\Actions\Categories\GetCategoryAncestors;
use App\Models\Category;
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

        $user = Auth::user();
        if ($request->route()->methods[0] == "DELETE" || $request->route()->methods[0] == "POST")
            return [];

        $category_path = GetCategoryAncestors::run($request->route()->parameter('id'));

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => [
                    'id' => $user?->id,
                    'name' => $user?->name,
                    'location' => $user?->location,
                    'phone_number' => $user?->phone_number,
                ]
            ],
            'category_path' => $category_path
        ]);
    }
}
