<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration</title>
</head>
<body>
<h1>User Registration</h1>

<form action="{{ route('register') }}" method="POST">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        @error('password')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
    </div>

    <button type="submit">Register</button>
</form>

<p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
</body>
</html>
