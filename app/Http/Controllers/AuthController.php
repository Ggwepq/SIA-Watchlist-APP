<?php

namespace App\Http\Controllers;

use App\Services\WatchlistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $base_url;

    public function __construct(WatchlistService $base_url)
    {
        $this->base_url = $base_url;
    }

    public function verifyToken(Request $request)
    {
        $response = '';

        $rule = [
            'watchlist_token' => 'required',
        ];

        $validator = Validator::make($request->all(), $rule);

        if (!$validator->fails()) {
            $response = $this->base_url->get('/user', [
                'Authorization' => 'Bearer ' . $request->watchlist_token,
            ]);
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($response->successful()) {
        }
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function logout()
    {
        return view('auth.register');
    }
}
