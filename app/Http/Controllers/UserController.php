<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function destroy(User $user)
    {
        // Check if the authenticated user is an admin
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }
        $banned_user_id = $user->id;

        // Get the users reviews
        $reviews = $user->reviews;

        // Delete the reviews
        foreach ($reviews as $review) {
            $review->delete();
        }

        // Delete the user
        $user->delete();

        // Log the user ban action
        Log::channel('audit')->info('User banned', [
            'admin_id' => auth()->user()->id,
            'banned_user_id' => $banned_user_id,
        ]);

        return redirect()->route('admin.view')->with('success', 'User banned successfully!');
    }

}
