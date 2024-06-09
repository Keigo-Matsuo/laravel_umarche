<?php

namespace App\Http\Controllers\Owner\Auth; // ここ

use App\Http\Controllers\Controller;
use App\Models\Owner; // ここ
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('owner.auth.register'); // ここ
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'], // ここ
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Owner::create([ // ここ
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::guard('owners')->login($user); // guard()追加

        // return redirect(RouteServiceProvider::OWNER_HOME); // ここ
        return redirect('/owner/login');
    }
}
