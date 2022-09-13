<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index(){
        return view('/pegawai.index');
    }

    public function add_data_pegawai(){
        return view('/pegawai.add');
    }
}
