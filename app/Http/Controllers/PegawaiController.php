<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

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

       return view('/pegawai.index');
    }
}
