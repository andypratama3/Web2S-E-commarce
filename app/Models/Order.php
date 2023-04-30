<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'address1',
        'address2',
        'phone',
        'city',
        'state',
        'country',
        'pincode',
        'total_price',
        'payment_mode',
        'payment_id',
        'status',
        'message',
        'tracking_no'
    ];
    public function orderItem(){
        return $this->hasMany(OrderItem::class);

    }
}
