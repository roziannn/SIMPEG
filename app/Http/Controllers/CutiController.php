<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/cuti.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add() //just view form and input field
    {
        return view('cuti.add');
    }

    public function store(Request $request)
    {
        Cuti::create($request->all());

        $request->accepts('session');
        session()->flash('success', 'Berhasil menambahkan data!');

        return view('/cuti.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $data = DB::select("SELECT * FROM cutis order by nama asc");

        return view('/cuti.index', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Cuti::find($id);
     
        return view('pegawai.edit', compact('edit'));
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        Cuti::where('id', $id)->update([
            'nama'=> $request->nama,
            'jabatan'=> $request->jabatan,
            'unitkerja_nama'=> $request->unitkerja_nama,
        ]);

        $request->accepts('session');
        session()->flash('success', 'Berhasil menambahkan user!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = Cuti::find($id);
        $data->delete();

        return redirect('/data-cuti')->with('successDelete', 'Data has been deleted!');
    }

    public function autocomplete(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Pegawai::where('nama', 'LIKE', '%' . $query . '%')->get('nama');
        return response()->json($filterResult);
    }
}
