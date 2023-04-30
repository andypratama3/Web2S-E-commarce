<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){

        $order = Order::where('user_id', Auth::id())->get();
        return view('user.order.myorder',compact('order'));
    }
    public function vieworder($id){

        $order = Order::where('id',$id)->where('user_id', Auth::id())->first();

        return view('user.order.vieworder',compact('order'));
    }
}
