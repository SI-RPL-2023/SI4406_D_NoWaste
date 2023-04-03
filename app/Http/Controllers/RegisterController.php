<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

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

        $validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);

        if(Merchant::create($validated)){
            $request->session()->flash('status', 'Berhasil mendaftar');
            return redirect('/login');
        }
    }
}
