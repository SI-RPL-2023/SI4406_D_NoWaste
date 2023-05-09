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
        if(request('keyword') && request('free') == NULL && request('minPrice') == NULL && request('maxPrice') == NULL){
            return $query->where('name', 'like', '%' . request('keyword') . '%');
        }
        elseif(request('keyword') && request('free') == 'yes'){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->where('price', '=', 0);
        }
        elseif(request('keyword') && request('minPrice') && request('maxPrice') == NULL){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->where('price', '>=', request('minPrice'));
        }
        elseif(request('keyword') && request('maxPrice') && request('minPrice') == NULL){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->where('price', '<=', request('maxPrice'));
        }
        elseif(request('keyword') && request('minPrice') != NULL && request('maxPrice') != NULL){
            return $query->where('name', 'like', '%' . request('keyword') . '%')->whereBetween('price', [request('minPrice'), request('maxPrice')]);
        }
    }
}
