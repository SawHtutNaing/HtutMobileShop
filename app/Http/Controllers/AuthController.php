<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'min:11'],

        ]);

        $user =  User::create($request->all());



        // Auth::login($user);
        event(new Registered($user));
        return redirect(route('home'));
    }

    public function login(Request $request)

    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->password === $credentials['password']) {
            Auth::login($user);
            return redirect(route('home'));
        }



        // if (Auth::attempt($request->only('email', 'password'))) {
        //     $user = Auth::user();

        //     return redirect(route('home'));
        // }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
