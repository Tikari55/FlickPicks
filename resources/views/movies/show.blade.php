<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $movie->Title }}</title>
</head>
<body>
<h1>{{ $movie->Title }}</h1>

<div>
    <img src="{{ $movie->Poster }}" alt="{{ $movie->Title }}" style="width: 200px;">
</div>

<p>Year: {{ $movie->Year }}</p>

@if ($movie->genres->isNotEmpty())
    <p>Genres:
        @foreach ($movie->genres as $genre)
            {{ $genre->GenreName }},
        @endforeach
    </p>
@endif

<p>Description: {{ $movie->Description }}</p>

<h2>Reviews</h2>
@if (Auth::check())
    <h2>Add Your Review</h2>
    <form action="{{ route('reviews.store', $movie->id) }}" method="POST">
    @csrf
        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
        <label for="Rating">Rating:</label>
        <input type="number" name="Rating" min="1" max="10" required>
        <label for="Comment">Comment:</label>
        <textarea name="Comment" rows="4" cols="50" required></textarea>
        <button type="submit">Submit Review</button>
    </form>
@endif

@if ($movie->reviews->isEmpty())
    <p>No reviews found.</p>
@else
    <ul>
        @foreach ($movie->reviews as $review)
            <li>
                <h3>{{ $review->Rating }}/10</h3>
                <p>{{ $review->Comment }}</p>
                <p>By: {{ $review->users->name }}</p>
            </li>
        @endforeach
    </ul>
@endif

<a href="{{ route('movies.search') }}">Back to Search</a>
</body>
</html>
