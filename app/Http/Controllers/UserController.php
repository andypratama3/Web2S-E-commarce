<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Riview;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $allproduct = Product::where('trending','1')->take(3)->get();
        $category = Category::where('popular','1')->take(3)->get();
        return view('user.index',compact('allproduct','category'));
    }
    public function category(){
        $category = Category::where('status','0')->get();
        return view('user.category',compact('category'));
    }
    public function product(){
        $product = Product::all();
        $category = Category::all();
        return view('user.product',compact('product'));
    }
    public function productname($prod_name)
    {
        if(Product::where('name',$prod_name)->first()){
            $product = Product::where('name',$prod_name)->first();
            $rating = Rating::where('prod_id',$product->id)->get();
            $rating_sum = Rating::where('prod_id',$product->id)->sum('stars_rated');
            $user_rating = Rating::where('user_id',Auth::id())->first();
            $review = Riview::where('prod_id',$product->id)->get();
            if($rating->count() > 0 ){
                $rating_value = $rating_sum/$rating->count();
            }
            else{
                $rating_value = 0;
            }
                return view('user.viewpro',compact('product','rating','review','rating_value','user_rating'));
            }else{
                return redirect('/')->with('status','The link was broken');
            }
        }

    public function viewcate($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $product = Product::where('cate_id', $category->id)->where('status','1')->get();
            return view('user.category',compact('category','product'));
        }else{
            return redirect('/')->with('status-slug','Slug doesnot Exits');
        }
    }
    public function viewproduct($cate_slug, $prod_slug){

        if(Category::where('slug',$cate_slug)->exists())
        {
            if(Product::where('slug',$prod_slug)->first()){

                $product = Product::where('slug',$prod_slug)->first();
                $rating = Rating::where('prod_id',$product->id)->get();
                $rating_sum = Rating::where('prod_id',$product->id)->sum('stars_rated');
                $user_rating = Rating::where('user_id',Auth::id())->first();
                $review = Riview::where('prod_id',$product->id)->get();
                if($rating->count() > 0 ){
                    $rating_value = $rating_sum/$rating->count();
                }
                else{
                    $rating_value = 0;
                }
                return view('user.viewcat',compact('product','rating','rating_value','review','user_rating'));

            }else{
                return redirect('/')->with('status','The link was broken');
            }
        }else{
            return redirect('/')->with('status','No such category found');
        }
    }

}
