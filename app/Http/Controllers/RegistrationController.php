<?php

namespace App\Http\Controllers;

use App\Models\RegisteredUser;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        error_log("inside register functionn");
        error_log(request('name'));
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'user_nickname' => 'nullable|string|max:20',
        //     'user_name' => 'nullable|string|max:50',
        //     'user_email' => 'required|string|email|max:255|unique:registered_user',
        //     'user_device_count' => 'nullable|integer',
        //     'password' => 'required|string|min:8|confirmed',
        // ]);
        // error_log("inside register functionn");

        $regUser=new RegisteredUser();

        $regUser->user_name=request('name');
        $regUser->user_nickname=request('user_nickname');
        $regUser->user_email=request('email');
        $regUser->user_hashed_password=bcrypt(request('password'));
        $regUser->user_device_count=4;
        $regUser->user_registered_timestamp= Carbon::now();

        $regUser->save();
        return redirect('/login');
        
        error_log($validatedData['name']);
        error_log($validatedData);
        // RegisteredUser::create([
        //     'name' => $validatedData['name'],
        //     'user_nickname' => $validatedData['user_nickname'],
        //     'user_name' => $validatedData['user_name'],
        //     'email' => $validatedData['email'],
        //     'user_device_count' => $validatedData['user_device_count'],
        //     'password' => bcrypt($validatedData['password']),
        // ]);
    
        // return redirect('/login')->with('success', 'Registration successful! Please log in.');


    }
    
}
