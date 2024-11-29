@extends('layout.main')

@section('content')
    <div class="min-h-screen bg-slate-950 font-mono overflow-hidden">
        <div class="fixed h-full w-full">
            <div
                class="absolute bottom-0 left-[-20%] right-0 top-[-10%] h-[500px] w-[500px] rounded-full bg-[radial-gradient(circle_farthest-side,rgba(255,0,182,.15),rgba(255,255,255,0))]">
            </div>
            <div
                class="absolute bottom-0 right-[-20%] top-[-10%] h-[500px] w-[500px] rounded-full bg-[radial-gradient(circle_farthest-side,rgba(255,0,182,.15),rgba(255,255,255,0))]">
            </div>
        </div>
        <div class="relative flex flex-col items-center justify-center min-h-screen gap-9">
            @if ($errors->any())
                <div class="toast toast-top toast-end">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="text-center">
                <div>
                    <h1 class="text-9xl font-bold">Watchlist</h1>
                    <p class="text-2xl text-gray-600 mb-8">
                        Your watchlists in one place 🎉!
                    </p>
                    <!-- <p class="text-sm text-gray-700 mb-3"> -->
                    <!--     Input your token to access your watchlists -->
                    <!-- </p> -->
                </div>
                <form action={{ route('verify') }} method="POST">
                    @csrf
                    <div class="flex flex-row items-center justify-center space-x-2">
                        <label class="input input-bordered input-primary flex items-center gap-2 w-80 h-16 max-w-s">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                class="h-4 w-4 opacity-70">
                                <path fill-rule="evenodd"
                                    d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z"
                                    clip-rule="evenodd" />
                            </svg>
                            <input name="watchlist_token" type="text" placeholder="Api Token" class="grow text-lg" />
                        </label>

                        <button type="submit" class="btn btn-secondary text-lg btn-lg">Go</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
