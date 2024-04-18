<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Register');
    }
    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();

        User::create($data);

        return redirect()->intended('/dashboard');
    }
}
