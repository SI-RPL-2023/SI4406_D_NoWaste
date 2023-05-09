<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Merchant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('web.home', [
            "Products" => Product::latest()->limit(4)->get(),
            "Merchants" => Merchant::latest()->limit(4)->get()
        ]);
    }

    public function search()
    {
        return view('web.search', [
            "title" => "Pencarian: ".request('keyword'),
            "keyword" => request('keyword'),
            "Products" => Product::latest()->filter()->get(),
            "Merchants" => Merchant::latest()->where('name', 'like', '%' . request('keyword') . '%')->get()
        ]);
    }
}
