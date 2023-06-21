<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin View</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1632094623687-5643447fadcc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #eee;
            margin: 0;
        }

        h1, h2, h3 {
            color: #ffde00;
        }

        p {
            margin: 5px 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 20px;
        }

        button {
            padding: 5px 10px;
            background-color: #ffde00;
            border: none;
            border-radius: 5px;
            color: #000;
            cursor: pointer;
        }

        a {
            color: #ffde00;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .admin-container {
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

        .admin-container h1, .admin-container h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="admin-container">
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
</div>
</body>
</html>
