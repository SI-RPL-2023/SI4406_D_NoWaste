<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Article;
use App\Models\Product;
use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Models\MerchantVerify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function showMerchantList()
    {
        return view('admin.merchants.index', [
            'Merchants' => Merchant::all(),
            'verifyMerchantRequests' => MerchantVerify::latest()->get(),
            'verifyMerchantPendingRequests' => MerchantVerify::where('status', 0)->count(),
            'page' => 'Merchant'
        ]);
    }

    public function showMerchantVerify(MerchantVerify $merchantverify)
    {
        return view('admin.merchants.verify_detail', [
            'verifyMerchantRequest' => $merchantverify,
            'page' => 'Merchant'
        ]);
    }

    public function confirmMerchantVerify(MerchantVerify $merchantverify)
    {
        if (MerchantVerify::where('id', $merchantverify->id)->update(['status' => 1])) {
            Merchant::where('id', $merchantverify->merchant_id)->update(['status' => 1]);

            return redirect('admin/merchants')->with('success', 'Permintaan verifikasi telah disetujui.');
        } else {
            return back()->with('success', 'Permintaan verifikasi gagal disetujui.');
        }
    }

    public function rejectMerchantVerify(MerchantVerify $merchantverify, Request $request)
    {
        $validatedData = $request->validate([
            'note' => 'required'
        ]);

        if (MerchantVerify::where('id', $merchantverify->id)->update(['status' => 2, 'note' => $validatedData['note']])) {
            return redirect('admin/merchants')->with('success', 'Permintaan verifikasi telah ditolak.');
        } else {
            return back()->with('success', 'Permintaan verifikasi gagal ditolak.');
        }
    }
}
