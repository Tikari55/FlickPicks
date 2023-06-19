<!DOCTYPE html>
<html>
<head>
    <title>Edit Review</title>
</head>
<body>
<div>
    <h1>Edit Review</h1>
    <a href="{{ route('profile') }}">Back to Profile</a>
</div>

<div>
    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="Rating">Rating:</label>
            <input type="number" id="Rating" name="Rating" min="1" max="10" value="{{ $review->Rating }}" required>
        </div>
        <div>
            <label for="Comment">Content:</label>
            <textarea id="Comment" name="Comment" required>{{ $review->Comment }}</textarea>
        </div>
        <button type="submit">Update Review</button>
    </form>
</div>
</body>
</html>
