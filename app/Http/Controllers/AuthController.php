<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username/Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);


        $loginField = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'npm';

        $infoLogin = [
            $loginField => $request->username,
            'password'  => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
            $request->session()->regenerate();
            return redirect()->route('homeindex');
        }

        return redirect('')->withErrors('Username dan password tidak sesuai')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}