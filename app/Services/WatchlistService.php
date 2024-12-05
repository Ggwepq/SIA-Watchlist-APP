<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WatchlistService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.api.base_url', env('API_BASE_URL'));
    }

    public function get($endpoint, $headers = [])
    {
        return Http::withHeaders($headers)->get($this->baseUrl . $endpoint);
    }

    public function post($endpoint, $data, $headers = [])
    {
        return Http::withHeaders($headers)->post($this->baseUrl . $endpoint, $data);
    }

    public function put($endpoint, $data, $headers = [])
    {
        return Http::withHeaders($headers)->put($this->baseUrl . $endpoint, $data);
    }

    public function delete($endpoint, $headers = [])
    {
        return Http::withHeaders($headers)->delete($this->baseUrl . $endpoint);
    }

    public function makeRequest($method, $endpoint, $data = [])
    {
        $token = session('watchlist_token');

        if (!$token) {
            throw new \Exception('No token found. Please log in.');
        }
        // Ensure the base URL ends with a single slash
        $baseUrl = rtrim($this->baseUrl, '/');

        // Ensure the endpoint starts without a slash
        $endpoint = ltrim($endpoint, '/');
        $fullUrl = "{$baseUrl}/{$endpoint}";

        logger()->info("Requesting URL: $fullUrl");

        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->$method($fullUrl, $data);
    }
}
