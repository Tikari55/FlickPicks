<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search movies</title>
</head>
<body>
<h1>Search movies</h1>

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
            <li>
                <div>
                    <img src="{{ $movie->Poster }}" alt="{{ $movie->Title }}" style="width: 100px;">
                </div>
                <div>
                    <h3>{{ $movie->Title }}</h3>
                </div>
            </li>
    @endforeach

@endif
</body>
</html>
