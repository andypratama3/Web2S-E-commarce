<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $tabla = 'products';
    protected $fillable = [
            'cate_id',
            'name',
            'slug',
            'small_desc',
            'desc',
            'original_price',
            'sell_price',
            'image',
            'qty',
            'tax',
            'status',
            'trending',
            'meta_title',
            'meta_keywords',
            'meta_desc',
    ];
    public function category(){

        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }
}

