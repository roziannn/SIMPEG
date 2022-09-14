@extends('layouts.master')

@section('title')
    Tambah Data Pegawai
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="btn-group btn-group-vertical">
                        <a href="/data-pegawai" class="btn btn-social btn-flat btn-warning btn-xs"><i
                        class="fa fa-arrow-circle-o-left"></i> Kembali ke Data Pegawai</a>
                    </div>
                </div>

                @if(session()->has('success'))
                <div class="box-body">
                  <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  </div>
                </div>
                @endif

                <form action="/store-data-pegawai" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group subtitle_head">
                                    <label class="text-right"><strong>DATA DIRI :</strong></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input id="nip" name="nip" class="form-control input-sm required nik"
                                        type="text" placeholder="Nomor NIP" value="">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap <code> (Tanpa Gelar) </code> </label>
                                    <input id="nama" name="nama" class="form-control input-sm required nama"
                                    maxlength="100" type="text" placeholder="Nama Lengkap" value="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="unitkerja_nama">Unit Kerja </label>
                                    <select class="form-control input-sm required" name="unitkerja_nama" id="unitkerja_nama">
                                        <option value="">Pilih Unit Kerja </option>
                                        <option value="SEKRETARIAT">SEKRETARIAT</option>
                                        <option value="BIDANG E-GOVERMENT">BIDANG E-GOVERMENT</option>
                                        <option value="BIDANG APLIKAS INFORMATIKA">BIDANG APLIKAS INFORMATIKA</option>
                                        <option value="UPTD PUSAT LAYANAN DIGITAL DATA">UPTD PUSAT LAYANAN DIGITAL DATA</option>
                                        <option value="BIDANG STATISTIK">BIDANG STATISTIK</option>
                                        <option value="BIDANG PERSANDIAN DAN KEAMANAN INFORMASI">BIDANG PERSANDIAN DAN KEAMANAN INFORMASI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan <code id="tampil_nik" style="display: none;"> (Sementara)
                                        </code></label>
                                    <input id="jabatan" name="jabatan" class="form-control input-sm required nik"
                                        type="text" placeholder="Jabatan" value="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="status_pegawai">Status Pegawai </label>
                                    <input id="status_pegawai" name="status_pegawai" class="form-control input-sm required nik"
                                        type="text" placeholder="Status Pegawai" value="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="no_telp">Nomor Telepon</label>
                                    <input id="no_telp" name="no_telp" class="form-control input-sm required nik"
                                        type="text" placeholder="Nomor Telepon" value="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="agama">Agama </label>
                                    <select class="form-control input-sm required" id="agama" name="agama" required>
                                        <option value="">Pilih Agama </option>
                                        <option value="ISLAM">ISLAM</option>
                                        <option value="KRISTEN">KRISTEN</option>
                                        <option value="KHATOLIK">KHATOLIK</option>
                                        <option value="HINDU">HINDU</option>
                                        <option value="BUDHA">BUDHA</option>
                                        <option value="KEPERCAYAAN PADA TUHAN YME/LAINNYA">KEPERCAYAAN PADA TUHAN YME/LAINNYA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin </label>
                                    <select class="form-control input-sm required" name="gender" id="gender">
                                        <option value="">Pilih Jenis Kelamin </option>
                                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea id="alamat" name="alamat" class="form-control input-sm" rows="3" placeholder="Alamat Pegawai"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i>
                            Batal</button>
                        <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-right"><i
                            class="fa fa-check"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-info">

            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
