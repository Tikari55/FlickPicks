<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
<div>
    <h1>Profile - {{ Auth::user()->name }}</h1>
    @if ($isAdmin)
        <a href="{{ route('admin.view') }}">Admin View</a>
    @endif
    <a href="{{ route('movies.search') }}">Back to Search</a>
</div>

<div>
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
</body>
</html>
