<?php

namespace App\Http\Controllers;

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

    public function processRegistration(Request $request)
    {
        // * Run validation the on request data
        $this->signupValidator();
        $request['password'] = Hash::make($request->password);
        User::create($request->all());
        return redirect()->route("login")->withRegistered(true);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function signupValidator()
    {
        Validator::make(request()->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',

        ], [
            "required" => ':attribute is required',
            "unique" => 'An account with this :attribute already exists',
            "confirmed" => ':attribute must match with Confirm Password'
        ], [
            "first_name" => "First Name",
            "last_name" => "Last Name",
            "email" => "Email Address",
            "password" => "Password"
        ])->validate();
    }
}
