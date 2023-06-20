<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Review</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1458053688450-eef5d21d43b3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1746&q=80');
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #eee;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
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

        .container {
            max-width: 500px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 5px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            text-align: left;
        }

        input[type="number"],
        textarea {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #ffde00;
            color: #000;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Review</h1>
    <a href="{{ route('profile') }}">Back to Profile</a>

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
