<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class RegisterAction
{
    use asAction;

    public function handle(array $data)
    {
        User::create($data);
        Session::regenerate();
        return redirect()->intended('/restaurant');
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'location' => ['required', 'string'],
            'phone_number' => ['required', 'string'],
            'password' => ['required']
        ];
    }

    public function asController(ActionRequest $request)
    {
        $data = $request->validated();
        return $this->handle($data);
    }
}
