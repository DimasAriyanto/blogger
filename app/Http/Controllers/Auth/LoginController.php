<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function postLogin(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->route('dashboard.index');
            } else {
                return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
            }
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Login failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Login failed. Please try again later.');
        }
    }

    public function postLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
