<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\WatchlistService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $watchlist_service;

    public function __construct(WatchlistService $base_url)
    {
        $this->watchlist_service = $base_url;
    }

    public function verifyToken(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'watchlist_token' => 'required',
        ]);

        // dd($validator->errors());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $response = $this->watchlist_service->get('user', [
            'Authorization' => 'Bearer ' . $request->watchlist_token,
        ]);

        if ($response->successful()) {
            $userData = $response->json();
            $this->loginOrCreateUser($userData, $request->watchlist_token);

            return redirect()->route('watchlists.index')->with('success', 'Token verified successfully.');
        }

        return redirect()->back()->with('error', 'Invalid token. Please try again.');
    }

    public function loginOrCreateUser(array $userData, string $token)
    {
        // Check if the user already exists
        $user = User::where('email', $userData['email'])->first();

        if (!$user) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make(uniqid()),
            ]);
        }

        // Store the token in the session for future authenticated API requests
        session(['watchlist_token' => $token]);

        // Log the user in
        Auth::login($user);
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function logout()
    {
        session()->forget('watchlist_token');
        Auth::logout();

        return redirect()->route('home')->with('success', 'Logged out successfully.');
    }
}
