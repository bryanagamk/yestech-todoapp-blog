<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        if (!$user) {
            Session::flash('error', 'Register Failed. Your account is not active, please re-register');
        }

        Session::flash('message', 'Successful Registration. Your account is already active, please login using your email and password.');
        return redirect()->route('login.index');
    }
}
