<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query)
    {
        if(request('keyword') && request('free') == NULL && request('minPrice') == NULL && request('maxPrice') == NULL && request('orderBy') == NULL){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->latest();
        }
        elseif(request('keyword') && request('free') == 'yes'){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->latest()->where('price', '=', 0);
        }
        elseif(request('keyword') && request('minPrice') && request('maxPrice') == NULL && request('orderBy') == NULL){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->latest()->where('price', '>=', request('minPrice'));
        }
        elseif(request('keyword') && request('maxPrice') && request('minPrice') == NULL && request('orderBy') == NULL){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->latest()->where('price', '<=', request('maxPrice'));
        }
        elseif(request('keyword') && request('minPrice') != NULL && request('maxPrice') != NULL && request('orderBy') == NULL){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->latest()->whereBetween('price', [request('minPrice'), request('maxPrice')]);
        }
        elseif(request('keyword') && request('minPrice') != NULL && request('maxPrice') != NULL && request('orderBy') == 'min_price'){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->orderBy('price', 'asc')->whereBetween('price', [request('minPrice'), request('maxPrice')]);
        }
        elseif(request('keyword') && request('minPrice') != NULL && request('maxPrice') != NULL && request('orderBy') == 'max_price'){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->orderBy('price', 'desc')->whereBetween('price', [request('minPrice'), request('maxPrice')]);
        }
        elseif(request('orderBy') == 'min_price' && request('keyword') && request('free') == NULL && request('minPrice') == NULL && request('maxPrice') == NULL ){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->orderBy('price', 'asc');
        }
        elseif(request('orderBy') == 'max_price' && request('keyword') && request('free') == NULL && request('minPrice') == NULL && request('maxPrice') == NULL ){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->orderBy('price', 'desc');
        }
    }
}
