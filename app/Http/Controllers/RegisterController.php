<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:merchants|max:255',
            'password' => 'required|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if(Merchant::create($validated)){
            $request->session()->flash('status', 'Berhasil mendaftar');
            return redirect('/login');
        }
    }
}
