@extends('layout.home')


@section('content')
    <iframe src="https://embed.su/embed/movie/{{ $tmdb_id }}" width="100%" height="750" frameborder="0"
        allowfullscreen></iframe>
@endsection
