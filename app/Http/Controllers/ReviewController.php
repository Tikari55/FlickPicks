<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
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
        // Check if the authenticated user owns the review
        if ($review->users_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $review->delete();

        return redirect()->route('profile')->with('success', 'Review deleted successfully!');
    }
}
