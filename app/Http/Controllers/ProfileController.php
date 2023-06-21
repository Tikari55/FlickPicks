<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $reviews = Review::where('users_id', $user->id)->get();

        $isAdmin = $user->roles()->where('RoleName', 'Admin')->exists();

        return view('profile', compact('reviews', 'isAdmin'));
    }

    public function adminView()
    {
        $user = Auth::user();
        $isAdmin = $user->roles()->where('RoleName', 'Admin')->exists();

        if (!$isAdmin) {
            abort(403, 'Unauthorized');
        }

        $reviews = Review::all();
        $users = User::all();

        return view('admin.view', compact('reviews', 'users'));
    }
}
