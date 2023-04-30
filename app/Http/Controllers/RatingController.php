<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Rating;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function add(Request $request){

        $stars_rated = $request->input('product_rating');
        $product_id = $request->input('product_id');

        $product_check = Product::where('id', $product_id)->where('status','1')->exists();
        if($product_check)
        {
            $verif = Order::where('orders.user_id', Auth::id())
            ->join('order_items','orders.id','order_items.order_id')
            ->where('order_items.prod_id', $product_id)->get();

            if($verif->count() > 0)
            {
                $exiting_rating = Rating::where('user_id',Auth::id())->where('prod_id',$product_id)->first();
                if($exiting_rating)
                {
                    $exiting_rating->stars_rated = $stars_rated;
                    $exiting_rating->update();
                }else{
                Rating::create([
                    'user_id'=> Auth::id(),
                    'stars_rated'=> $stars_rated,
                    'prod_id'=>$product_id,

                ]);
            }
            return redirect()->back()->with('status','Thank You For Rated This Product ');
        }
        else
        {
            return redirect()->back()->with('status','You a Cannot Rate withOut Purchase');
        }
        }
        else
        {
            return redirect()->back()->with('status','The Link Was Broken');
        }
    }
}

