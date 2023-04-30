<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('admin.product.index',compact('product'));
    }
    public function add(){
        $category = Category::all();
        return  view('admin.product.add',compact('category'));
    }
    public function insert(Request $request){
        $product = new Product();
        if($request->hasFile('image')){
            $request->file('image')->move('assets/upload/product/', $request->file('image')->getClientOriginalName());
            $product->image = $request->file('image')->getClientOriginalName();
        }
        $product->cate_id = $request->input('cate_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_desc = $request->input('small_desc');
        $product->desc = $request->input('desc');
        $product->original_price = $request->input('original_price');
        $product->sell_price = $request->input('sell_price');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1' : '0';
        $product->trending = $request->input('trending') == TRUE ? '1' : '0';
        $product->tax = $request->input('tax');
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_desc = $request->input('meta_desc');
        $product->save();
        return redirect('/product')->with('status-insert','Product Successfully Add');
    }
    public function show($id){
        $product = Product::find($id);
        $category = Category::all();
        return view('admin.product.edit',compact('product','category'));
    }
    public function update(Request $request,$id){
        $product = Product::find($id);
        if($request->hasFile('image')){
            $path = 'assets/upload/category/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
                $request->file('image')->move('assets/upload/category/', $request->file('image')->getClientOriginalName());
                $category->image = $request->file('image')->getClientOriginalName();
        }
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_desc = $request->input('small_desc');
        $product->desc = $request->input('desc');
        $product->original_price = $request->input('original_price');
        $product->sell_price = $request->input('sell_price');
        $product->qty = $request->input('qty');
        $product->status = $request->input('status') == TRUE ? '1' : '0';
        $product->trending = $request->input('trending') == TRUE ? '1' : '0';
        $product->tax = $request->input('tax');
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_desc = $request->input('meta_desc');
        $product->update();
        return redirect('product')->with('status-update','Product SuccessFully Update');
    }

    public function delete($id){
        $product = Product::find($id);
        if($product->image){
            $path = 'assets/upload/product/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('product')->with('status-delete','Product HasBeen Delete');
    }
}
