@extends('layout.home')

@section('content')
    <div class="flex-1 p-6">
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-primary"> {{ $watchlist['title'] }} 🎬</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($watchlist['movies'] as $movie)
                @php
                    $details = $movie['details'];
                @endphp
                <a href="{{ url('/player/' . $details['id']) }}">
                    <div class="card bg-base-300 shadow-lg">
                        <figure>
                            <img src="https://image.tmdb.org/t/p/w500{{ $details['poster_path'] }}"
                                alt="{{ $details['title'] }}">
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title text-secondary">{{ $details['title'] }}</h2>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
