<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy(User $user)
    {
        // Delete the user and their associated reviews
        $user->reviews()->delete();
        $user->delete();

        return redirect()->route('admin.view')->with('success', 'User banned successfully!');
    }

}
