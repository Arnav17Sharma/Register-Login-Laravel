<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class AuthManager extends Controller
{
    function dashboard() {
        if(Auth::user()){
            return view('dashboard');
        }
        return redirect(route('login'))->with('error', "Cannot see dashboard without login.");
    }
    function login() {
        return view('login');
    }

    function registration() {
        return view('registration');
    }

    function loginPost(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $user1 = User::where([
            'username' => $request->username, 
            'password' => $request->password
        ])->first();

        $user2 = User::where([
            'email' => $request->username, 
            'password' => $request->password
        ])->first();
        
        if($user1)
        {
            Auth::login($user1);
            return redirect()->route('dashboard');
        }
        else if($user2)
        {
            Auth::login($user2);
            return redirect()->route('dashboard');
        }
        // 
        // THIS BLOCK WILL BE USED WHEN WE NEED TO CHECK HASHED PASSWORDS IN THE DB.
        // $credentials = $request->only('username', 'password');
        // // return $credentials;
        // if (Auth::attempt($credentials)) {
        //     return redirect()->intended(route('dashboard'));
        // }
        return redirect(route('login'))->with('error', "Wrong Credentials");
    }

    function registrationPost(Request $request) {
        $request->validate([
            'username' =>  'required|unique:users',
            'email' =>  'required|email|unique:users',
            'password' =>  'required'
        ]);
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $user = User::create($data);
        if($user) {
            return redirect(route('login'))->with('success', "User created, please login with your credentials.");
        }
        return redirect(route('login'))->with('error', "User not created. Try again.");
    }

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
