<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('merchant.menu.index', [
            'Articles' => Article::all()
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
            'name' => 'required|max:255',
            'content' => 'required'
        ]);
        if(Article::create($validated)){
            return redirect('/merchant/menu')->with('success', 'Menu baru berhasil ditambahkan.');
        }else {
            return back()->with('error', 'Menu gagal ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('merchant.menu.edit', [
            'Article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'content' => 'required'
        ]);
        if(Article::where('id', $article->id)->update($validated)){
            return redirect('/merchant/menu')->with('success', 'Perubahan berhasil disimpan.');
        }else {
            return back()->with('error', 'Perubahan gagal disimpan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if(Article::where('id', $article->id)->delete()){
            return redirect('/merchant/menu')->with('error', 'Menu berhasil dihapus.');
        }
    }
}
