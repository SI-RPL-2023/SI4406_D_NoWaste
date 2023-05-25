<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.article.index', [
            'Admin' => auth()->guard('admin')->user(),
            'Articles' => Article::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'body' => 'required'
        ]);

        $imageSrc = $this->extractImageSrcFromBody($validatedData['body']);
        $validatedData['image'] = $imageSrc;
        $validatedData['status'] = $request->has('status') ? 1 : null;
        $validatedData['published_at'] = $validatedData['status'] ? date("Y-m-d H:i:s") : null;
        $validatedData['admin_id'] = auth()->guard('admin')->user()->id;

        $article = Article::create($validatedData);

        if ($article) {
            return redirect('/admin/article')->with('success', 'Artikel baru berhasil dibuat.');
        } else {
            return back()->with('error', 'Artikel gagal disimpan.');
        }
    }

    private function extractImageSrcFromBody($body)
    {
        $pattern = '/<img[^>]+src="([^"]+)"/';
        preg_match($pattern, $body, $matches);

        return !empty($matches[1]) ? $matches[1] : null;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }

    public function ckeditorUploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
      
            $url = $request->file('upload')->storeAs('articles', $fileName, 'public');
  
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => '/storage/'.$url]);
        }
    }
}
