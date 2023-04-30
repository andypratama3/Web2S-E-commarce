<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index(){

        $orders = Order::where('status','0')->get();
        return view('admin.orders.index',compact('orders'));
    }
    public function view($id){

        $order = Order::where('id', $id)->first();
        return view('admin.orders.vieworder',compact('order'));
    }
    public function updateOrder(Request $request, $id){

       $order = Order::find($id);
       $order->status = $request->input('order_status');
       $order->update();
       return redirect('orders')->with('status','Order Update Successfully');
    }
    public function orderhistory(){
        $order = Order::where('status','1')->get();
        return view('admin.orders.history',compact('order'));
    }
}
