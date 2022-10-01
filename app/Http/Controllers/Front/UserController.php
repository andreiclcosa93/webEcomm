<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Models\User;

class UserController extends Controller
{
    public function showSettings()
    {
        return view('front.user.cpanel.info');
    }

    public function showResetPass()
    {
        return view('front.user.cpanel.reset');
    }

    public function resetPass(Request $request)
    {
        $request->validate([
            'current_pass' => ['required', new MatchOldPassword],
            'newpassword' => ['required', 'confirmed', 'min:8'],

            'newpassword_confirmation' => 'same:newpassword'
        ],
        [
            'current_pass.required' => 'you must enter the current password to be able to change it',
            'newpassword.required' => 'you must enter the new password',
            'newpassword.confirmed' => 'you did not confirm the new password correctly',
            'newpassword.min' => 'the password must contain at least 8 characters',
            'newpassword.confirmation.same' => 'you did not confirm the new password correctly',
        ]
    );

    $user = User::findOrFail(auth()->id());
    $user->password=bcrypt($request->newpassword);
    $user->save();

    return back();

    }
}
