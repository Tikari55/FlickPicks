<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        Log::channel('audit')->info('New user has registered', [
            'user_id' => $user->id,
        ]);

        // Assign "RegisteredUser" role to the user
        $registeredUserRole = Roles::where('RoleName', 'RegisteredUser')->first();
        $user->roles()->attach($registeredUserRole);

        // Log in the registered user
        Auth::login($user);

        // Redirect to a page after successful registration
        return redirect()->route('movies.search')->with('success', 'Registration successful!');
    }
}
