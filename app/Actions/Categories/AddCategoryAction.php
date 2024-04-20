<?php

namespace App\Actions\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class AddCategoryAction
{
    use asAction;

    public function handle($data, $id = null)
    {
        if ($id && GetCategoryAncestors::run($id)->length() == 4)
            return redirect()->back()->withErrors('The subcategory limit is 4');
        Category::create([
            'name'=>$data['name'],
            'user_id'=>Auth::id(),
            'parent_id'=> $id
        ]);
    }

    public function asController(ActionRequest $request, $id = null)
    {
        $data = $request->validated();
        $this->handle($data, $id);
        if ($id)
            return redirect()->intended('/category/'.$id);
        return back();
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'id'=>['integer']
        ];
    }
}
