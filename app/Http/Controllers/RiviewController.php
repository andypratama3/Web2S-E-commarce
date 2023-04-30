<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Riview;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiviewController extends Controller
{
    public function add($product_slug){

        $product = Product::where('slug',$product_slug)->where('status','1')->first();

        if($product)
        {
            $product_id = $product->id;
            $verif = Order::where('orders.user_id', Auth::id())
            ->join('order_items','orders.id','order_items.order_id')
            ->where('order_items.prod_id', $product_id)->get();
            return view('user.riview.index',compact('product','verif'));

        }
        else
        {
            return redirect()->back()->with('status','The Link Was Broken');
        }
    }
    public function create(Request $request){
        $product_id = $request->input('product_id');
        $product = Product::where('id',$product_id)->where('status','1')->first();
        if($product){
            $user_riview = $request->input('user_riview');
            $new_riview = Riview::create([
                'user_id'=> Auth::id(),
                'prod_id'=>$product_id,
                'user_riview'=>$user_riview
            ]);
            $category_slug = $product->category->slug;
            $prod_slug = $product->slug;
            if($new_riview)
            {
                return redirect('view-product/'.$category_slug.'/'.$prod_slug)->with('status','Thank You For Writing The Riview');
            }
        }else{
            redirect()->back()->with('status','The Link Was Broken');
        }
    }
    public function edit($product_slug){

        $product = Product::where('slug',$product_slug)->where('status','1')->first();
        if($product){
            $product_id = $product->id;
            $riview = Riview::where('user_id',Auth::id())->where('prod_id',$product_id)->first();
            if($riview){
                return view('user.riview.edit',compact('riview'));
            }else{
                redirect()->back()->with('status','The Link Was Broken');
            }
        }
    }
    public function update_riview(Request $request){
        $user_riview = $request->input('user_riview');
        if($user_riview != ''){
            $riview_id = $request->input('riview_id');
            $riview = Riview::where('id',$riview_id)->where('user_id',Auth::id())->first();
            if($riview){
                $riview->user_riview = $request->input('user_riview');
                $riview->update();
                return redirect('view-product/'.$riview->product->category->slug.'/'.$riview->product->slug)->with('status','Riview Hasbeen Update');
            }else{
                redirect()->back()->with('status','The Link Was Broken');
            }
        }else{
            redirect()->back()->with('status','You Cannot Submit Empty riview');
        }
    }
}
