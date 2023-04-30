<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function index(){

        $old_cartitem = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitem as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id',auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartitem = Cart::where('user_id', Auth::id())->get();
        return view('user.checkout',compact('cartitem'));
    }
    public function placeorder(Request $request){

        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');
        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');

        $total = 0;
        $cartitem_total = Cart::where('user_id',Auth::id())->get();
        foreach($cartitem_total as $prod)
        {
            $total += $prod->product->sell_price;
        }
        $order->total_price = $total;
        $order->tracking_no = 'Andy'.rand(1111,9999);
        $order->save();

        $order->id;
        $cartitem = Cart::where('user_id', Auth::id())->get();
        foreach($cartitem as $item)
        {
            OrderItem::create([
                'order_id'=> $order->id,
                'prod_id'=> $item->prod_id,
                'qty'=> $item->prod_qty,
                'price'=> $item->product->sell_price,
            ]);

            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
        if(Auth::user()->address1 == NULL)
        {
            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }
        $cartitem = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitem);
        return response()->json(['status'=>"Order placed Successfully"]);
        return redirect('/')->with('status','Successfully');

    }
    //pay
    public function pay(Request $request){

        $cartitem = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach($cartitem as $item){
            $total_price += $item->product->sell_price * $item->product->qty;

        }
        $fname =$request->input('fname');
        $lname =$request->input('lname');
        $email =$request->input('email');
        $phone =$request->input('phone');
        $address1 =$request->input('address1');
        $address2 =$request->input('address2');
        $city =$request->input('city');
        $state =$request->input('state');
        $country =$request->input('country');
        $pincode =$request->input('pincode');
        $payment_mode = $request->input('payment_mode');
        $payment_id = $request->input('payment_id');
        return response()->json([
            'fname'=> $fname,
            'lname'=> $lname,
            'email'=> $email,
            'phone'=> $phone,
            'address1'=> $address1,
            'address2'=> $address2,
            'city' => $city,
            'state' => $state,
            'country'=> $country,
            'pincode'=> $pincode,
            'total_price'=> $total_price,
            'payment_mode'=> $payment_mode,
            'payment_id'=> $payment_id
        ]);
        return response()->json(['status','Successfully']);
    }
}




