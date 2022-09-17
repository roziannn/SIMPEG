@extends('layouts.master')
<link rel="icon" href="">

@section('title')
    Tambah Data Cuti Pegawai
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
@endpush

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<style>
    .form-horizontal .control-label-left-left {
        text-align: left;
    }
</style>
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <a href="/data-cuti"
                class="btn btn-social btn-flat btn-info btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                title="Kembali Ke Daftar Program Bantuan"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Data Cuti</a>
        </div>
        <form action="/store-data-cuti" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label-left col-sm-3" for="nama">Nama</label>
                    <div class="col-sm-4">
                        <input name="nama" class="form-control input-sm required" maxlength="100"
                            placeholder="Nama" id="nama" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label-left col-sm-3" for="nama">Jabatan</label>
                    <div class="col-sm-3">
                        <input name="jabatan" class="form-control input-sm required" maxlength="100"
                            placeholder="Jabatan" id="jabatan" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label-left-left">Unit Kerja</label>
                    <div class="col-sm-3">
                        <select class="form-control input-sm required" name="unitkerja_nama" id="unitkerja_nama">
                            <option value="">Pilih Unit Kerja </option>
                            <option value="SEKRETARIAT">SEKRETARIAT</option>
                            <option value="BIDANG E-GOVERMENT">BIDANG E-GOVERMENT</option>
                            <option value="BIDANG APLIKAS INFORMATIKA">BIDANG APLIKAS INFORMATIKA</option>
                            <option value="UPTD PUSAT LAYANAN DIGITAL DATA">UPTD PUSAT LAYANAN DIGITAL DATA</option>
                            <option value="BIDANG STATISTIK">BIDANG STATISTIK</option>
                            <option value="BIDANG PERSANDIAN DAN KEAMANAN INFORMASI">BIDANG PERSANDIAN DAN KEAMANAN
                                INFORMASI</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label-left-left">Jenis Cuti</label>
                    <div class="col-sm-3">
                        <select class="form-control input-sm required" name="jenis_cuti" id="jenis_cuti">
                            <option value="">Pilih Jenis Cuti </option>
                            <option value="1">TAHUNAN</option>
                            <option value="2">BESAR</option>
                            <option value="3">SAKIT</option>
                            <option value="4">MELAHIRKAN</option>
                            <option value="5">BERSAMA</option>
                            <option value="6">KARENA ALASAN PENTING</option>
                            <option value="7">DILUAR TANGGUNGAN NEGARA</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label-left col-sm-3" for="lama_terbilang">Lama Terbilang</label>
                    <div class="col-sm-3">
                        <input name="lama_terbilang" id="lama_terbilang" class="form-control input-sm required" maxlength="100"
                            placeholder="Lama Cuti Dalam Hari" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label-left">Tanggal Cuti</label>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm date" id="datetimepicker">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control input-sm pull-right required" id="tgl_mulai" name="tgl_mulai"
                                placeholder="Tgl. Mulai" type="text">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm date" id="datetimepicker">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control input-sm pull-right required" id="tgl_selesai" name="tgl_selesai"
                                placeholder="Tgl. Akhir" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label-left" for="uraian">Uraian</label>
                    <div class="col-sm-4">
                        <textarea id="uraian" name="uraian" class="form-control input-sm required" placeholder="Isi Uraian"
                            rows="3"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label-left" for="tgl_post">Tanggal Pengajuan </label>
                    <div class="col-sm-4">
                        <div class="input-group input-group-sm date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control input-sm pull-right required" id="tgl_pengajuan" name="tgl_pengajuan"
                                placeholder="Tgl. Pengajuan" type="text">
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('.date').datepicker({
                        format: 'mm-dd-yyyy'
                    });
                </script>
                <div class="form-group">
                    <label class="col-sm-3 control-label-left" for="status">Keterangan Proses</label>
                    <div class="col-sm-3">
                        <select class="form-control input-sm required" name="status" id="status">
                            <option value="">Pilih Keterangan</option>
                            <option value="1">DIAJUKAN</option>
                            <option value="0">DISETUJUI ATASAN</option>
                            <!-- Default Value Aktif -->
                        </select>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i>
                    Batal</button>
                <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-right confirm"><i
                        class="fa fa-check"></i> Simpan</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
@endpush