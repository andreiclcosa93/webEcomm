<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // return view('auth.register');

        return view('front.user.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
            [
                'name.required' => 'You must enter a username',
                'name.string' => 'The name must be a string of characters - it cannot start with a number',
                'name.max' => 'The name may not exceed 255 octopus, including empty spaces',

                'email.required' => 'Email address is required',
                'email.email' => 'You must enter a valid email address',
                'email.unique' => 'This email address is already registered on the site',
                'email.max' => 'Eemail cannot be more than 255 characters long',

                'password.required' => 'You must enter a password for your account',
                'password.confirmed' => 'You have not confirmed your password correctly'
            ]
    );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        Alert::success('the account has been created')->persistent(true, false);
        return redirect(route('home'));
    }
}
