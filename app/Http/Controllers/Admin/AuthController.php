<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginStaffRequest;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.personal.login');
    }


    public function login(LoginStaffRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('control-panel'));
    }
}


