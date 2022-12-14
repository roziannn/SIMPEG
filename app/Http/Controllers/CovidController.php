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
        // $penerima = DB::select('SELECT * FROM covids order by nip asc');
        $penerima = DB::select('SELECT pegawais.nip, pegawais.nama, pegawais.jabatan, pegawais.unitkerja_nama, pegawais.no_telp, pegawais.alamat, covids.nip, covids.vaksin1, covids.vaksin2, covids.vaksin3 from pegawais, covids where pegawais.nip
        = covids.nip');

        $data = DB::select("SELECT * FROM covids");

        return view('covid19.vaksin.daftar_penerima.index', (compact('data', 'penerima')));
    }
    public function rekap()
    {
        //count total per- satu unit
        $data = DB::select('SELECT pegawais.unitkerja_nama, count(pegawais.unitkerja_nama) as sudah_vaksin from pegawais, covids  where pegawais.nip
        = covids.nip group by unitkerja_nama');

        $belum_vaksin = DB::select("SELECT  count(unitkerja_nama) as belum_vaksin from pegawais where nip not in (select nip from covids) group by unitkerja_nama");
        // dd($belum_vaksin);
        
        
        $total_1 = DB::select("SELECT count(nip) as total_sudah_vaksin from covids");
        
        $total_2 = DB::select("SELECT count(nip) as total_belum_vaksin from pegawais where nip not in (select nip from covids)");
        
        return view('covid19.vaksin.rekap_penerima.rekap', compact('data', 'belum_vaksin', 'total_1', 'total_2'));
    }

    //while click button add
    public function add_daftar_penerima()
    {

        $data = DB::table('pegawais')->orderBy('nama', 'asc')->get();
        return view('covid19.vaksin.daftar_penerima.add', compact('data'));
    }

    public function store_penerima(Request $request)
    {

        Covid::create($request->all());

        $data = DB::table('pegawais')->orderBy('nama', 'asc')->get();

        $request->accepts('session');
        session()->flash('success', 'Berhasil menambahkan data!');

        return view('/covid19.vaksin.daftar_penerima.add', compact('data'));
    }

    public function delete_penerima($id)
    {
        $data = Covid::find($id);
        $data->delete();

        return redirect('/data-vaksin')->with('successDelete', 'Data has been deleted!');
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
