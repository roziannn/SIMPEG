<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaduanController extends Controller
{

    public function index()
    {
        $pengaduan = DB::select('SELECT pegawais.nama, pegawais.nip, pegawais.unitkerja_nama, pengaduans.token,  pengaduans.judul,  pengaduans.tanggal,  pengaduans.status from pegawais, pengaduans where pegawais.nama = pengaduans.nama');

        $data = DB::select("SELECT  pegawais.nip, pengaduans.id FROM  pegawais, pengaduans where pegawais.nama = pengaduans.nama");
   
        $total = DB::table('pengaduans')->select(DB::raw('count(tanggal) as sum_total'),DB::raw('count(tanggal) as sum_month'), DB::raw('count(status) as sum_menunggu'))->get();

        $total1 = DB::select("SELECT count(status) as sum_menunggu from pengaduans where status LIKE '%Menunggu%'");
        $total2 = DB::select("SELECT count(status) as sum_sedang_proses from pengaduans where status LIKE '%Sedang%'");
        $total3 = DB::select("SELECT count(status) as sum_selesai from pengaduans where status LIKE '%Selesai%'");

        return view('pengaduan.index', compact('pengaduan', 'data', 'total', 'total1','total2','total3'));
    }

    public function create()
    {

        $now = Carbon::now();
        $tglLaporan = Carbon::now()->format('d/m/Y');

        $urut = DB::table('pengaduans')->orderBy('id', 'desc')->first()->id;

        $thnBulan = $now->year . $now->month;
        $token = $thnBulan . sprintf('%03d', $urut + 1);

        $data = DB::table('pegawais')->orderBy('nama', 'asc')->get();

        return view('pengaduan.create',   compact('data', 'urut', 'thnBulan', 'tglLaporan', 'token'));
    }

    public function store(Request $request)
    {
        Pengaduan::create($request->all());

        $request->accepts('session');
        session()->flash('success', 'Berhasil menambahkan data!');

        return back();
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        $data = Pengaduan::find($id);
        $data->delete();

        return redirect('/pengaduan')->with('successDelete', 'Data has been deleted!');
    }
}
