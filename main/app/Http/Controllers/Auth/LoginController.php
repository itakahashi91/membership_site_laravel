<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function guard()
    {
        return Auth::guard('user');
    }

    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        return redirect(route('login'));
    }
}
