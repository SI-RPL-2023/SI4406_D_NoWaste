<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Merchant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $Products = Product::latest();
        if(request('search')){
            return view('web.find', [
                "title" => "Pencarian: ".request('search'),
                "keyword" => request('search'),
                "Products" => Product::latest()->where('name', 'like', '%' . request('search') . '%')->get()
            ]);
        }
        return view('web.home', [
            "Products" => Product::latest()->limit(4),
            "Merchants" => Merchant::latest()->limit(4)
        ]);
    }
}
