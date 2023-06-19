<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->route('movies.search')->with('success', 'Login successful!');
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('movies.search');
    }
}
