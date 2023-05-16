<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    //
    public function index()
    {
        return view('merchant.home');
    }

    public function edit()
    {
        return view('merchant.profile.edit', [
            'Merchant' => auth()->guard('merchant')->user()
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'bio' => 'max:255',
            'photo' => 'image|mimes:jpg,jpeg,png,svg|max:2048'
        ]);

        if($request->file('photo')){
            $validated['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        if(Merchant::where('id', $request->id)->update($validated)){
            return redirect('/merchant/profile')->with('success', 'Perubahan berhasil disimpan.');
        }else {
            return back()->with('error', 'Perubahan gagal disimpan.');
        }
    }

    public function editPassword()
    {
        return view('merchant.profile.edit_password', [
            'Merchant' => auth()->guard('merchant')->user()
        ]);
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|different:old_password',
        ]);

        if(Hash::check($request->old_password, auth()->guard('merchant')->user()->password)) {
            Merchant::where('id', auth()->guard('merchant')->user()->id)->update(['password' => Hash::make($request->password)]);
        
            return redirect('/merchant/profile/password')->with('success', 'Password berhasil diubah');
        } else {
            return redirect('/merchant/profile/password')->with('error', 'Password lama tidak sesuai');
        }
    }

    public function show(Merchant $merchant)
    {
        return view('web.merchant', [
            'Merchant' => $merchant,
            'Products' => $merchant->products
        ]);
    }
}
