<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __invoke(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('name', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('admin.index');
        }

        return back()->withErrors(__('auth.failed'));
    }
}
