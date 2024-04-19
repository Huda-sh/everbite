<?php

namespace App\Actions\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteCategoryAction
{
    use asAction;

    public function handle($id)
    {
        $category = Auth::user()->categories->find($id);
        $category->delete();
    }

    public function asController($id)
    {
        $this->handle($id);
        return back();
    }
}
