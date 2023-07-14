<?php

namespace App\Http\Controllers;

use App\Http\Requests\Signup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

// use App\Http\Controllers\TodoController;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except("logout");
    }

    public function login()
    {
        return view("auth.login");
    }

    public function validateLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            // * Authenticate the user accessing the todo api endpoint
            session(['jwt-token' => TodoController::authenticateUser()->json('token')]);
            return redirect()->intended(route('home'));
        } else {
            return back()->withMessage('Incorrect login details');
        }
    }

    public function register()
    {
        return view("auth.register");
    }

    public function processRegistration(Signup $request)
    {
        // * Run validation the on request data
        $validated = $request->validate();
        $request['password'] = Hash::make($request->password);
        User::create($validated);
        return redirect()->route("login")->withRegistered(true);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
