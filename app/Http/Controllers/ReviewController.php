<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
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

        Log::channel('audit')->info('Review created',[
            'user_id' => auth()->user()->id,
            'review_id' => $review->id,
            'movie_title' => $movie->Title,
            'movie_id' => $movie->id,
        ]);

        return redirect()->route('movies.show', $movie)->with('success', 'Review submitted successfully!');
    }

    public function edit(Review $review)
    {
        // Check if the authenticated user owns the review
        if ($review->users_id !== Auth::id() and !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        // Check if the authenticated user owns the review
        if ($review->users_id !== Auth::id() and !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'Rating' => 'required|integer|min:1|max:10',
            'Comment' => 'required|string',
        ]);

        $review->Rating = $request->Rating;
        $review->Comment = $request->Comment;
        $review->save();

        Log::channel('audit')->info('Review updated',[
            'user_id' => auth()->user()->id,
            'review_id' => $review->id,
        ]);
        if(Auth::user()->isAdmin())
        {
            return redirect()->route('admin.view')->with('success', 'Review updated successfully!');
        }
        else
        {
            return redirect()->route('profile')->with('success', 'Review updated successfully!');
        }

    }

    public function destroy(Review $review)
    {
        // Check if the authenticated user owns the review
        if ($review->users_id !== Auth::id() and !Auth::user()->isAdmin()) {
            abort(403, 'Unauthorized');
        }

        $review->delete();

        Log::channel('audit')->info('Review deleted',[
            'user_id' => auth()->user()->id,
            'review_id' => $review->id,
        ]);

        if (Auth::user()->isAdmin())
        {
            return redirect()->route('admin.view')->with('success', 'Review deleted successfully!');
        }
        else
        {
            return redirect()->route('profile')->with('success', 'Review deleted successfully!');
        }
    }
}
