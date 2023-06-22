<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration</title>

    <style>
    body {
        background-image: url('https://images.unsplash.com/photo-1535016120720-40c646be5580?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80');
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    .card {
        background-color: rgba(0, 0, 0, 0.7) !important;
        color: #eee;
        border: none;
    }

    .card-header {
        background-color: #333;
        color: #eee;
    }

    .container {
        max-width: 500px;
    }

    .white-text {
        color: #eee;
    }

    .btn-primary {
        background-color: #ffde00;
        color: #000;
        border: none;
    }

    .btn-primary:hover {
        background-color: #ffcc00;
        color: #000;
    }

    .text-danger {
        color: #ffcc00;
    }
</style>
</head>
<body>
<div class="container">
    <div>
        <div>
            <div class="card">
                <div class="card-header">User Registration</div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" required>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" class="form-control" name="password" required>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password:</label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
            <div class=>
                <p class="white-text">Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
