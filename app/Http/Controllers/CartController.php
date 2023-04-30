<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addproduct(Request $request){

        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check()){

            $prod_check = Product::where('id',$product_id)->first();

            if($prod_check)
            {
                if(Cart::where('prod_id', $product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name. ' Already Added To Cart']);
                }else{
                $cartItem = new Cart();
                $cartItem->prod_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->prod_qty = $product_qty;
                $cartItem->save();
                return response()->json(['status' => $prod_check->name. ' Added To Cart']);
                }
            }
        }else{
            return response()->json(['status' => "Login To continue"]);

        }
    }
    public function viewcart(){
        $cartItem = Cart::where('user_id', Auth::id())->get();
        return view('user.cart', compact('cartItem'));
    }
    public function updatecart(Request $request){
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');

        if(Auth::check()){
            if(Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->exists())
            {
                $cart = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status'=>'Quantity Update']);
            }
        }
    }
    //delet cart with ajax
    public function deletecart(Request $request){
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
            $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
            $cartItem->delete();
            return response()->json(['status' => "Cart HasBeen Delete"]);
            }
        }
        else{
            return response()->json(['status' => "Login To continue"]);

        }
    }
    public function cartcount(){
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count'=> $cartcount]);
    }
}       //delete product laravel not ajax
        // $cartItem = Cart::find($id);
            //     $cartItem->delete();
            //     return redirect('/cart')->with('status','cart Has Been Delete');



