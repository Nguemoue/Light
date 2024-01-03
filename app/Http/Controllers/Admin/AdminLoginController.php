<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class AdminLoginController extends Controller
{
    public function create()
    {
        return Inertia::render("Admin/Login");
    }
    public function store(Request $request){
        $request->validate([
            "login"=>"required|string",
            "password"=>"required|string"
        ]);
        if (! Auth::guard("admin")->attempt($request->only('login', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'login' => trans('auth.failed'),
            ]);
        }
        $request->session()->regenerate();
        return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
    }
}
