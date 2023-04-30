<?php

namespace App\Models;

use App\Models\User;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Riview extends Model
{
    use HasFactory;
    protected $table = 'riviews';
    protected $fillable = [
       'user_id',
       'prod_id',
       'user_riview',

    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    // public function rating(){

    //     return $this->belongsTo(Rating::class, 'user_id','user_id');
    // }
    public function product(){

        return $this->belongsTo(Product::class, 'prod_id','id');
    }
}
