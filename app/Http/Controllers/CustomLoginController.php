<?php

namespace App\Http\Controllers;

use App\Models\RegisteredUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = RegisteredUser::where('user_email', $email)->first();
        if ($user && Hash::check($password, $user->user_hashed_password)) {
            Session::put('user_email', $request->email);
            return redirect('/');
        }
        return redirect('/login')->with('error', 'Invalid credentials');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user_email');
        return redirect('/');
    }
}
