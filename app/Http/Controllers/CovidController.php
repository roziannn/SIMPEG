<?php

namespace App\Http\Controllers;

use App\Models\Covid;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerima = DB::table('covids')->orderBy('nama', 'asc')->get();

        return view('covid19.vaksin.daftar_penerima.index', compact('penerima'));
    }
    public function rekap()
    {
        return view('covid19.vaksin.rekap_penerima.rekap');
    }

    //while click button add
    public function add_daftar_penerima(){

        $data = DB::table('pegawais')->orderBy('nama', 'asc')->get();
        return view('covid19.vaksin.daftar_penerima.add', compact('data'));
    }

    public function store_penerima(Request $request){

        Covid::create($request->all());
        $data = DB::table('pegawais')->orderBy('nama', 'asc')->get();

        $request->accepts('session');
        session()->flash('success', 'Berhasil menambahkan data!');

        return view('/covid19.vaksin.daftar_penerima.add', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
