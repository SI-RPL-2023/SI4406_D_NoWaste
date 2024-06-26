<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (!Auth::guard('merchant')->user()) {
            return view('login');  
        } else {
            return redirect('/merchant');
        }
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('merchant')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/merchant');
        }

        return back()->with('LoginError', 'Email atau password salah');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
