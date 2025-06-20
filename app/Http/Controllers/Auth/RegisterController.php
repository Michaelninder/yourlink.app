<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
		$request->validate([
		    'email' => 'required|string|email|max:255|unique:users',
		    'password' => ['required', 'confirmed'],
		    'terms' => 'accepted',
		]);


        $user = User::create([
            'id' => Str::uuid(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->has('login_after_register')) {
            Auth::login($user);
            return redirect()->route('user.dashboard');
        }

        return redirect()->route('login')->with('success', 'Account created. Please login.');
    }
}
