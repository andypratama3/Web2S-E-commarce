<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }
    public function add(){
        return view('admin.category.add');
    }
    public function insert(Request $request){
        $category = new Category();
        if($request->hasFile('image')){
            $request->file('image')->move('assets/upload/category/', $request->file('image')->getClientOriginalName());
            $category->image = $request->file('image')->getClientOriginalName();
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->desc = $request->input('desc');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_desc = $request->input('meta_desc');
        $category->save();
        return redirect('/category')->with('status-insert','Category Successfully Add');
    }
    public function show($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request,$id){
        $category = Category::find($id);
        if($request->hasFile('image')){
        $path = 'assets/upload/category/'.$category->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
            $request->file('image')->move('assets/upload/category/', $request->file('image')->getClientOriginalName());
            $category->image = $request->file('image')->getClientOriginalName();
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->desc = $request->input('desc');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_desc = $request->input('meta_desc');
        $category->update();
        return redirect('/category')->with('status-update','Category Successfully Update');

    }
    public function delete($id){
        $category = Category::find($id);
        if($category->image){
            $path = 'assets/upload/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('/category')->with('status-delete','Category HasBeen Delete');
    }
}
