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
}
