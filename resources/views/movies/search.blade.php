<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search movies</title>
</head>
<body>
<div style="position: absolute; top: 10px; right: 10px;">
    @auth
        <a href="{{ route('profile') }}">Profile</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @else
        <a href="{{ route('register') }}">Register</a>
        <a href="{{ route('login') }}">Login</a>
    @endauth
</div>

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
                    <a href="{{ route('movies.show', $movie->id) }}">
                        <img src="{{ $movie->Poster }}" alt="{{ $movie->Title }}" style="width: 100px;">
                    </a>
                </div>
                <div>
                    <h3>
                        <a href="{{ route('movies.show', $movie->id) }}">{{ $movie->Title }}</a>
                    </h3>
                </div>
            </li>
        @endforeach
    </ul>
@endif

</body>
</html>
