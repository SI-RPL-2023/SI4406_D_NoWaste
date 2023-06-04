<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Models\MerchantVerify;
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
            'photo' => 'image|mimes:jpg,jpeg,png,svg|max:2048',
        ]);

        $validated['map'] = $this->replaceMapSizeValue($request->map);

        if($request->file('photo')){
            $validated['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        if(Merchant::where('id', $request->id)->update($validated)){
            return redirect('/merchant/profile')->with('success', 'Perubahan berhasil disimpan.');
        }else {
            return back()->with('error', 'Perubahan gagal disimpan.');
        }
    }

    private function replaceMapSizeValue($html)
    {
        // Mengganti nilai width
        $html = preg_replace('/width="[^"]+"/', 'width="100%"', $html);

        // Mengganti nilai height
        $html = preg_replace('/height="[^"]+"/', 'height="100%"', $html);

        return $html;
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

    public function showVerify()
    {
        return view('merchant.profile.verify_merchant', [
            'Merchant' => auth()->guard('merchant')->user(),
            'verifies' => MerchantVerify::where('merchant_id', auth()->guard('merchant')->user()->id)->latest()->first()
        ]);
    }

    public function sendVerify(Request $request)
    {
        $validatedData = $request->validate([
            'co_name' => 'required|max:255',
            'co_type' => 'required|max:255',
            'co_document' => 'mimes:pdf|max:2048',
            'co_npwp' => 'required|max:255'
        ]);

        $validatedData['merchant_id'] = auth()->guard('merchant')->user()->id;
        $validatedData['status'] = 0;

        if($request->file('co_document')){
            $validatedData['co_document'] = $request->file('co_document')->store('docs', 'public');

            if(MerchantVerify::create($validatedData)){
                return redirect('/merchant/verify')->with('success', 'Permintaan verifikasi telah terkirim.');
            }else {
                return back()->with('error', 'Permintaan verifikasi gagal dikirim.');
            }
        }
    }
}
