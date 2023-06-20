<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $movie->Title }}</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #eee;
            margin: 0;
        }

        h1, h2, h3 {
            color: #ffde00;
        }

        a {
            color: #ffde00;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .movie-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            margin-top: 100px;
        }

        .movie-container img {
            width: 200px;
            margin-bottom: 20px;
        }

        .movie-details {
            margin-bottom: 20px;
        }

        .movie-details p {
            margin: 10px 0;
        }

        .reviews-container {
            margin-top: 20px;
        }

        .reviews-container ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .reviews-container li {
            margin-bottom: 20px;
        }

        .reviews-container h3 {
            margin: 0;
        }

        .reviews-container p {
            margin: 5px 0;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="movie-container">
    <h1>{{ $movie->Title }}</h1>

    <div>
        <img src="{{ $movie->Poster }}" alt="{{ $movie->Title }}">
    </div>

    <div class="movie-details">
        <p>Year: {{ $movie->Year }}</p>
        @if ($movie->genres->isNotEmpty())
            <p>Genres:
                @foreach ($movie->genres as $genre)
                    {{ $genre->GenreName }},
                @endforeach
            </p>
        @endif
        <p>Description: {{ $movie->Description }}</p>
    </div>

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
        <div class="reviews-container">
            <ul>
                @foreach ($movie->reviews as $review)
                    <li>
                        <h3>{{ $review->Rating }}/10</h3>
                        <p>{{ $review->Comment }}</p>
                        <p>By: {{ $review->users->name }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <a class="back-link" href="{{ route('movies.search') }}">Back to Search</a>
</div>
</body>
</html>
