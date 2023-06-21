<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


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
            Log::channel('audit')->info('User has logged in', [
                'user_id' => Auth::id(),
            ]);
            return redirect()->route('movies.search')->with('success', 'Login successful!');
        } else {
            // Authentication failed
            Log::channel('audit')->info('User tried to login, but failed', [
                'user_id' => $request->user_id,
            ]);
            return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
        }
    }

    public function logout()
    {
        Log::channel('audit')->info('User has logged out', [
            'user_id' => Auth::id(),
        ]);
        Auth::logout();
        return redirect()->route('movies.search');
    }
}
