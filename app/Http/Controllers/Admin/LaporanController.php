<?php

namespace App\Http\Controllers\Admin;

use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index(){
        $laporan = Laporan::all();
        return view('admin.laporan.index',compact('laporan'));
    }
    public function add(){
        return view('admin.laporan.add');
    }
    public function insert(Request $request){

        $laporan = new Laporan();
        if($request->hasFile('laporan')){
            $request->file('laporan')->move('assets/upload/laporan/', $request->file('laporan')->getClientOriginalName());
            $laporan->laporan = $request->file('laporan')->getClientOriginalName();
        }
        $laporan->nama_laporan = $request->input('nama_laporan');
        $laporan->save();
        return redirect('/laporan')->with('status-insert','Laporan Successfully Add');
    }
    public function delete($id){
        $laporan = Laporan::find($id);
        $laporan->delete();
        return redirect('/laporan')->with('status-delete','Laporan Successfully Delete');
    }
}
