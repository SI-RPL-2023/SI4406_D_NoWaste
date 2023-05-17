<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('merchant.menu.index', [
            'Products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchant.menu.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'merchant_id' => 'required',
            'name' => 'required|max:255',
            'price' => 'required|max:8',
            'stock' => 'required|max:8',
            'description' => 'max:255',
            'photo' => 'image|mimes:jpg,jpeg,png,svg|max:2048'
        ]);

        if($request->file('photo')){
            $validated['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        if(Product::create($validated)){
            return redirect('/merchant/menu')->with('success', 'Menu baru berhasil ditambahkan.');
        } else {
            return back()->with('error', 'Menu gagal ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('merchant.menu.edit', [
            'Product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'merchant_id' => 'required',
            'name' => 'required|max:255',
            'price' => 'required|max:8',
            'stock' => 'required|max:8',
            'description' => 'max:255',
            'photo' => 'image|mimes:jpg,jpeg,png,svg|max:2048'
        ]);

        if($request->file('photo')){
            $validated['photo'] = $request->file('photo')->store('uploads', 'public');
        }

        if(Product::where('id', $product->id)->update($validated)){
            return redirect('/merchant/menu')->with('success', 'Perubahan berhasil disimpan.');
        }else {
            return back()->with('error', 'Perubahan gagal disimpan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if(Product::where('id', $product->id)->delete()){
            return redirect('/merchant/menu')->with('error', 'Menu berhasil dihapus.');
        }
    }
}
