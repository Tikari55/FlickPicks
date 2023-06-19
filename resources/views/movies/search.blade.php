<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Results</title>
</head>
<body>
<h1>Search Results</h1>

<div>
    <form action="{{ route('movies.search') }}" method="GET">
        <label>
            <input type="text" name="search" placeholder="Search movies...">
        </label>
        <button type="submit">Search</button>
    </form>
</div>

@if ($movies->isEmpty())
    <p>No movies found.</p>
@else
    <ul>
        @foreach ($movies as $movie)
            <li>{{ $movie->title }}</li>
        @endforeach
    </ul>
@endif
</body>
</html>
