<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function __construct(protected UserServiceInterface $registerService)
    {
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        try {
            $data = $request->validated();

            // Use the RegisterService to handle the registration process
            $user = $this->registerService->create($data);

            return redirect()->route('auth.show-login-form')->with('success', 'Registration successful! You can now log in.');
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error('Registration failed: ' . $e->getMessage());

            // Rollback any database transactions, if applicable
            DB::rollback();

            return redirect()->back()->with('error', 'Registration failed. Please try again later.');
        }
    }
}
