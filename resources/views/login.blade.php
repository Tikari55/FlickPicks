<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1025&q=80');
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

        .text-danger {
            color: #ffcc00;
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

        .form-check-label.light-text {
            color: #eee;
        }

        .login-link {
            color: #ffde00;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .white-text {
    color: #eee;
}
    </style>
</head>
<body class="bg-light">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label light-text" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-3 text-center">
    <p class="light-text">
        <span class="white-text bg-dark p-1">Don't have an account?</span>
        <a href="{{ route('register') }}" class="login-link">Register</a>
    </p>
</div>

        </div>
    </div>
</div>
</body>
</html>
