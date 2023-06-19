<!DOCTYPE html>
<html>
<head>
    <title>Admin View</title>
</head>
<body>
<h1>Admin View</h1>

<h2>All Reviews</h2>
<ul>
    @foreach ($reviews as $review)
        <li>
            <p>Review ID: {{ $review->id }}</p>
            <p>Rating: {{ $review->Rating }}/10</p>
            <p>Comment: {{ $review->Comment }}</p>
            <p>By: {{ $review->users->name }}</p>
            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <a href="{{ route('reviews.edit', $review->id) }}">Edit</a>
        </li>
    @endforeach
</ul>

<h2>All Users</h2>
<ul>
    @foreach ($users as $user)
        <li>
            <p>User ID: {{ $user->id }}</p>
            <p>Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Ban User</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
