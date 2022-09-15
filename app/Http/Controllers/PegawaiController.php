<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(){
        return view('/pegawai.index');
    }

    public function add_data_pegawai(){
        return view('/pegawai.add');
    }

    public function store_add_data(Request $request){
      
       Pegawai::create($request->all());

       $request->accepts('session');
       session()->flash('success', 'Berhasil menambahkan data!');

       return view('/pegawai.add');
    }

    public function data_pegawai(){

        $data = DB::select("SELECT * FROM pegawais");

        return view('pegawai.index', ['data'=>$data]);
    }

    public function show($id){
        
        $pegawai = Pegawai::find($id);

        return view('pegawai.show', compact('pegawai'));
    }

    public function delete($id){
        $user = Pegawai::find($id);
        $user->delete();

        return redirect('/data-pegawai')->with('successDelete', 'Data has been deleted!');
    }

   
}
