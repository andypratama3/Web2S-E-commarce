<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index(){
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('user.wishlist',compact('wishlist'));

    }
    public function add(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            if(Product::find($prod_id))
            {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();

                return response()->json(['status' => "Add to Wishlist Success"]);
            }
            else
            {
                return response()->json(['status'=> "Product is Doesn't exists"]);
            }
        }else{
            return response()->json(['status' => "Login To Continue"]);
        }
    }
    public function deletewishlist(Request $request){
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');
            if(Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
            $wishlist = Wishlist::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
            $wishlist->delete();
            return response()->json(['status' => "Wishlist HasBeen Delete"]);
            }
        }
        else{
            return response()->json(['status' => "Login To continue"]);

        }
    }
    public function wishlistcount(){
        $Wishlistcount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count'=> $Wishlistcount]);
    }

}
