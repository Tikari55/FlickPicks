<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1585951237318-9ea5e175b891?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80');
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

        .profile-container {
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
<div class="profile-container">
    <h1>Profile - {{ Auth::user()->name }}</h1>
    @if ($isAdmin)
        <a href="{{ route('admin.view') }}">Admin View</a>
    @endif
    <a class="back-link" href="{{ route('movies.search') }}">Back to Search</a>

    <div class="reviews-container">
        <h2>Your Reviews</h2>
        <ul>
            @foreach($reviews as $review)
                <li>
                    <h3>{{ $review->movies->Title }}</h3>
                    {{ $review->Rating }}/10 - {{ $review->Comment }}
                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route('reviews.edit', $review->id) }}">Edit</a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>
