<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Article;
use App\Models\Product;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home', [
            'Merchants' => Merchant::all(),
            'Products' => Product::all(),
            'Articles' => Article::where('status', 1)->get(),
            'page' => 'Home'
        ]);
    }
    
    public function signin()
    {
        if (!Auth::guard('admin')->user()) {
            return view('signin');  
        } else {
            return redirect('/admin');
        }
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');
        }

        return back()->with('LoginError', 'Username atau password salah');
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/signin');
    }
}
