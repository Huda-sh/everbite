<?php

namespace App\Actions\Auth;

use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class LoginAction
{
    use asAction;

    public function handle(array $credentials)
    {

        if (Auth::attempt($credentials)) {
            Session::regenerate();
//            $request->session()->regenerate();

            return redirect()->intended('/restaurant');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }
    public function asController(ActionRequest $request){
        $credentials = $request->validated();
        return $this->handle($credentials);
    }
}
