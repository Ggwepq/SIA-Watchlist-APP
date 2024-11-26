<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Watchlist App</title>

    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-base-200">
    <div class="flex items-center justify-center min-h-screen">
        <div class="card bg-base-100 shadow-lg p-6 w-full max-w-sm">
            <h2 class="text-2xl font-bold text-center mb-4">Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-control mb-4">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" id="email" class="input input-bordered w-full" required>
                </div>
                <div class="form-control mb-6">
                    <label class="label" for="password">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" name="password" id="password" class="input input-bordered w-full" required>
                </div>
                <button type="submit" class="btn btn-primary w-full">Login</button>
            </form>
            <p class="text-sm text-center mt-4">
                Don't have an account?
                <a href="{{ route('register.form') }}" class="link link-primary">Register</a>
            </p>
        </div>
    </div>
</body>

</html>
