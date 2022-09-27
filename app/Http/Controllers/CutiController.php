<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CutiController extends Controller
{
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }


    public function add() //just view form and input field
    {

        $data = DB::table('pegawais')->orderBy('nama', 'asc')->get();
        return view('cuti.add', compact('data'));
    }

    public function store(Request $request)
    {
        Cuti::create($request->all());
        $data = DB::table('pegawais')->orderBy('nama', 'asc')->get();

        $request->accepts('session');
        session()->flash('success', 'Berhasil menambahkan data!');

        return view('/cuti.add', compact('data'));
    }


    public function show()
    {

        $data = DB::select("SELECT * FROM cutis order by nama asc");

        return view('/cuti.index', ['data' => $data]);
    }

    public function edit($id)
    {
        $edit = Cuti::find($id);
     
        return view('pegawai.edit', compact('edit'));
         
    }


    public function update(Request $request, $id){
        Cuti::where('id', $id)->update([
            'nama'=> $request->nama,
            'lama_terbilang'=> $request->lama_terbilang,
            'tgl_pengajuan'=> $request->tgl_pengajuan,
            'tgl_mulai'=> $request->tgl_mulai,
            'tgl_selesai'=> $request->tgl_selesai,
            'status'=> $request->status,
        ]);

        return redirect()->back()->with('update_success', 'Update data berhasil!');;
    }


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
