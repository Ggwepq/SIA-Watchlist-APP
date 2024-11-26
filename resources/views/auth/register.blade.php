<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - Watchlist App</title>

    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-base-200">
    <div class="flex items-center justify-center min-h-screen">
        <div class="card bg-base-100 shadow-lg p-6 w-full max-w-sm">
            <h2 class="text-2xl font-bold text-center mb-4">Register</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-control mb-4">
                    <label class="label" for="name">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" name="name" id="name" class="input input-bordered w-full" required>
                </div>
                <div class="form-control mb-4">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" name="email" id="email" class="input input-bordered w-full" required>
                </div>
                <div class="form-control mb-4">
                    <label class="label" for="password">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" name="password" id="password" class="input input-bordered w-full" required>
                </div>
                <div class="form-control mb-6">
                    <label class="label" for="password_confirmation">
                        <span class="label-text">Confirm Password</span>
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="input input-bordered w-full" required>
                </div>
                <button type="submit" class="btn btn-primary w-full">Register</button>
            </form>
            <p class="text-sm text-center mt-4">
                Already have an account?
                <a href="{{ route('login.form') }}" class="link link-primary">Login</a>
            </p>
        </div>
    </div>
</body>

</html>
