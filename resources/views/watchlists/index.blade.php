@extends('layout.home')

@section('content')
    <div class="flex-1 p-6">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold">Watchlists 🎬</h2>
            <p class="text-gray-400">Browse all your watchlists in one place</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

            @if (!empty($watchlists) && count($watchlists['data']) > 0)
                @foreach ($watchlists['data'] as $watchlist)
                    <!-- Example Watchlist Card -->
                    <div class="card bg-base-300 w-96 shadow-xl">
                        <figure>
                            <img src="{{ $watchlist['image_url'] ? $watchlist['image_url'] : asset('img/default.png') }}"
                                alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-primary">{{ $watchlist['title'] }}</h2>
                            <p class="text-ellipsis overflow-hidden">{{ $watchlist['description'] }}</p>
                            <div class="card-actions justify-end">
                                <a href="{{ url('/watchlist/' . $watchlist['id']) }}" class="btn btn-primary text-2xl"><i
                                        class="ti ti-eye"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="relative flex flex-col items-center justify-center min-h-screen gap-9">
                    <div class="text-center">
                        <div>
                            <h1 class="text-9xl font-bold">No Watchlist</h1>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endsection
