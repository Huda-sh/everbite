<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class LogoutAction
{

    use asAction;

    public function handle(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();

        Session::invalidate();

        Session::regenerateToken();

        return redirect()->intended('/');
    }

    public function asController(ActionRequest $request): \Illuminate\Http\RedirectResponse
    {
        return $this->handle();
    }
}
