<?php

namespace App\Http\Controllers;

use App\Services\WatchlistService;
use CodeBugLab\Tmdb\Facades\Tmdb;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    protected $watchlist_service;

    public function __construct(WatchlistService $base_url)
    {
        $this->watchlist_service = $base_url;
    }

    public function index()
    {
        try {
            $response = $this->watchlist_service->makeRequest('get', '/v1/watchlists');

            $watchlists = $response->json();  // Decode the API response
        } catch (\Exception $e) {
            $watchlists = [];
        }

        return view('watchlists.index', compact('watchlists'));
    }

    public function showWatchlist($id)
    {
        try {
            $response = $this->watchlist_service->makeRequest('get', '/v1/watchlists/' . $id);

            $watchlist = $response->json()['data'];  // Decode the API response

            foreach ($watchlist['movies'] as &$movie) {
                // Get TMDB movie details using the TMDB API
                $tmdbDetails = Tmdb::movies()->details($movie['tmdb_id'])->get();

                // Append TMDB details to the movie
                $movie['details'] = $tmdbDetails;
            }
        } catch (\Exception $e) {
            $watchlists = [];
        }

        return view('watchlists.show', compact('watchlist'));
    }

    public function player($id)
    {
        $tmdb_id = $id;
        return view('watchlists.player', compact('tmdb_id'));
    }
}
