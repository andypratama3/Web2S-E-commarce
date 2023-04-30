<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'desc',
        'status',
        'popular',
        'image',
        'meta_title',
        'meta_desc',
        'meta_keywords',

    ];
    public function product(){

        return $this->hasMany(Product::class, 'cate_id', 'id');
    }
}
