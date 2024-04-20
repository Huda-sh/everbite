<?php

namespace App\Http\Middleware;

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
        if ($request->route()->methods[0]=="DELETE")
            return [];

        $current_category = $request->route()->parameter('id');
        $category_path = [];
        if (!$current_category) {
            $category_path = [];
        } else {
            $category = Category::findOrFail($current_category);
            while ($category) {
                $category_path[] = ['id' => $category->id, 'name' => $category->name];
                $category = $category->parent;
            }
        }
        $category_path = array_reverse($category_path);
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => [
                    'name' => $user?->name,
                    'location' => $user?->location,
                    'phone_number' => $user?->phone_number,
                ]
            ],
            'category_path' => $category_path
        ]);
    }
}
