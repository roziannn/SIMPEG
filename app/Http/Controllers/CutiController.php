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
        return view('cuti.add');
    }

    public function store(Request $request)
    {
        Cuti::create($request->all());

        $request->accepts('session');
        session()->flash('success', 'Berhasil menambahkan data!');

        return view('/cuti.add');
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
            'jabatan'=> $request->jabatan,
            'status'=> $request->status,
        ]);

        $request->accepts('session');
        session()->flash('success', 'Berhasil mengupdate data!');

        return redirect()->back();
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
