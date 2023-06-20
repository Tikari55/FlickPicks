<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search movies</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1489599849927-2ee91cede3ba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #eee;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1, h3 {
            color: #ffde00;
        }

        a {
            color: #ffde00;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .auth-links {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .search-box {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-box input {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-right: 10px;
        }

        .search-box button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #ffde00;
            color: #000;
            cursor: pointer;
        }

        .content {
            margin-top: 20px;
        }

        .no-movies {
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }

        .no-movies p {
            margin: 0;
        }

        .movie-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .movie-list li {
            width: 30%;
            margin-bottom: 20px;
        }

        .movie-list img {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="auth-links">
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

<div class="search-box">
    <form action="{{ route('movies.search') }}" method="GET">
        <label>
            <input type="text" name="search" placeholder="Search movies...">
        </label>
        <button type="submit">Search</button>
    </form>
</div>

<div class="content">
    @if ($movies->isEmpty())
        <div class="no-movies">
            <p>No movies found.</p>
        </div>
    @else
        <ul class="movie-list">
            @foreach ($movies as $movie)
                <li>
                    <div>
                        <a href="{{ route('movies.show', $movie->id) }}">
                            <img src="{{ $movie->Poster }}" alt="{{ $movie->Title }}">
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
</div>

</body>
</html>
