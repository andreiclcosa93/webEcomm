<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginStaffRequest;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function logout()
    {
        Auth::guard('staff')->logout();
        Alert::success('logout successfull')->persistent(true, false);
        return redirect(route('home'));
    }
}


