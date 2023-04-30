<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserpanelController extends Controller
{
    public function index(){
        $user = User::all();
        return view('admin.user.index',compact('user'));
    }
}
