<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function users(){
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }
    public function viewuser($id){
        $user = User::find($id);
        return view('admin.user.viewuser',compact('user'));
    }

}
