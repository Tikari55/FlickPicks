<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ReviewController extends Controller
{
    public function store(Request $request, Movies $movie)
    {
        $request->validate([
            'Rating' => 'required|integer|min:1|max:10',
            'Comment' => 'required',
        ]);

        $review = new Review();
        $review->Rating = $request->input('Rating');
        $review->Comment = $request->input('Comment');
        $review->movies_id = $movie->id;
        $review->users_id = auth()->user()->id;
        $review->save();

        return redirect()->route('movies.show', $movie)->with('success', 'Review submitted successfully!');
    }

    public function edit(Review $review)
    {
        // Check if the authenticated user owns the review
        if ($review->users_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        // Check if the authenticated user owns the review
        if ($review->users_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'Rating' => 'required|integer|min:1|max:10',
            'Comment' => 'required|string',
        ]);

        $review->Rating = $request->Rating;
        $review->Comment = $request->Comment;
        $review->save();

        return redirect()->route('profile')->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        $user = User::find($review->user_id);

        // Check if the authenticated user is the owner of the review or an admin
        if ($user->id === $review->user_id || $user->hasRole('Admin')) {
            $review->delete();

            // Check if the user is an admin
            if ($user->hasRole('Admin')) {
                return redirect()->route('admin.view')->with('success', 'Review deleted successfully!');
            }

            // If the user is a regular user, redirect to their profile
            return redirect()->route('profile')->with('success', 'Review deleted successfully!');
        }

        // If the user is not the owner of the review and not an admin, redirect back with an error message
        return redirect()->back()->with('error', 'You are not authorized to delete this review.');
    }
}
