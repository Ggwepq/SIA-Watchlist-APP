<!DOCTYPE html>
<html lang="en" data-theme="sunset">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Watchlist</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-base-200 font-mono">
    <div class="flex items-center justify-center min-h-screen gap-9">
        @if (session(error))
            <div role="alert" class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session(error) }}</span>
            </div>
        @endif
        <div class="text-center">
            <div>
                <h1 class="text-9xl font-bold mb-6">Watchlist</h1>
                <p class="text-xl text-gray-600 mb-8">
                    Manage and track your favorite movies in one place!
                </p>
            </div>
            <form action={{ route('verify') }} method="POST">
                @csrf
                <div class="flex flex-row items-center justify-center space-x-2">
                    <label class="input input-bordered input-primary flex items-center gap-2 w-80 max-w-s">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path fill-rule="evenodd"
                                d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <input name="watchlist_token" type="text" placeholder="Api Token" class="grow" />
                    </label>

                    <button type="submit" class="btn btn-secondary text-lg">Go</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
