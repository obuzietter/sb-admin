<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Exceptions;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    /**
     * Register a new user
     */
    public function register(Request $request)
    {
        
        try {
            // Validate input
            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'required|string|max:255',
                'password' => 'required|string|min:6|confirmed',
            ]);
    
            // Create user
            $user = User::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'] ?? null,
                'phone' => $validated['phone'] ?? null,
                'password' => Hash::make($validated['password']),
            ]);
    
            // Redirect to login page with success message
            return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    
        } catch (ValidationException $e) {
            // Redirect back with validation errors
            return redirect()->back()->withErrors($e)->withInput();
    
        } catch (Exceptions $e) {
            // Handle unexpected errors
            return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }
    /**
     * Login user and return token
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->withErrors([
                'email' => 'No account found with this email.',
            ])->withInput($request->only('email'));
        }
    
        if (!Auth::guard('user')->attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'password' => 'Incorrect password. Please try again.',
            ])->withInput($request->only('email'));
        }
    
        $request->session()->regenerate();
        return redirect()->route('home');
    }
    

    /**
     * Logout user (Revoke token)
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    /**
     * Get authenticated user
     */
    public function profile(Request $request)
    {
        return response()->json(['user' => $request->user()], 200);
    }
}
