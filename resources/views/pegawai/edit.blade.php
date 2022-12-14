@extends('layouts.master')

@section('title')
    Edit Biodata Pegawai
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

                @if (session()->has('success'))
                    <div class="box-body">
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </div>
                    </div>
                @endif
                
                <div class="box-body">
                    <form action="{{ url('edit-pegawai/' . $edit->id) }}" method="POST">
                        @csrf
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
                                        type="text" placeholder="Nomor NIP" value="{{ $edit->nip }}">
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap <code> (Tanpa Gelar) </code> </label>
                                    <input id="nama" name="nama" class="form-control input-sm required nama"
                                        maxlength="100" type="text" placeholder="Nama Lengkap"
                                        value="{{ $edit->nama }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="unitkerja_nama">Unit Kerja </label>
                                    <select class="form-control input-sm required" name="unitkerja_nama" id="unitkerja_nama"
                                        value="{{ $edit->unitkerja_nama }}">
                                        <option value="">Pilih Unit Kerja </option>
                                        <option
                                            value="SEKRETARIAT"{{ $edit->unitkerja_nama == 'SEKRETARIAT' ? 'selected' : '' }}>
                                            SEKRETARIAT</option>
                                        <option
                                            value="BIDANG E-GOVERMENT"{{ $edit->unitkerja_nama == 'BIDANG E-GOVERMENT' ? 'selected' : '' }}>
                                            BIDANG E-GOVERMENT</option>
                                        <option
                                            value="BIDANG APLIKASI INFORMATIKA"{{ $edit->unitkerja_nama == 'BIDANG APLIKASI INFORMATIKA' ? 'selected' : '' }}>
                                            BIDANG APLIKAS INFORMATIKA</option>
                                        <option
                                            value="UPTD PUSAT LAYANAN DIGITAL DATA"{{ $edit->unitkerja_nama == 'UPTD PUSAT LAYANAN DIGITAL DATA' ? 'selected' : '' }}>
                                            UPTD PUSAT LAYANAN DIGITAL DATA
                                        </option>
                                        <option
                                            value="BIDANG STATISTIK"{{ $edit->unitkerja_nama == 'BIDANG STATISTIKA' ? 'selected' : '' }}>
                                            BIDANG STATISTIK</option>
                                        <option
                                            value="BIDANG PERSANDIAN DAN KEAMANAN INFORMASI"{{ $edit->unitkerja_nama == 'BIDANG PERSANDIAN DAN KEAMANAN INFORMASI' ? 'selected' : '' }}>
                                            BIDANG PERSANDIAN DAN
                                            KEAMANAN INFORMASI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="jabatan">Jabatan </label>
                                    <select class="form-control input-sm required" name="jabatan" id="jabatan"
                                        value="{{ $edit->jabatan }}">
                                        <option value="">Pilih Jabatan </option>
                                        <option value="DIREKSI"{{ $edit->jabatan == 'DIREKSI' ? 'selected' : '' }}>DIREKSI
                                        </option>
                                        <option
                                            value="DIREKTUR UTAMA"{{ $edit->jabatan == 'DIREKTUR UTAMA' ? 'selected' : '' }}>
                                            DIREKTUR UTAMA</option>
                                        <option value="DIREKTUR"{{ $edit->jabatan == 'DIREKTUR' ? 'selected' : '' }}>
                                            DIREKTUR</option>
                                        <option
                                            value="HR & PERSONALIA"{{ $edit->jabatan == 'HR & PERSONALIA' ? 'selected' : '' }}>
                                            HR & PERSONALIA</option>
                                        <option value="MANAJER"{{ $edit->jabatan == 'MANAJER' ? 'selected' : '' }}>MANAJER
                                        </option>
                                        <option value="SUPERVISOR"{{ $edit->jabatan == 'SUPERVISOR' ? 'selected' : '' }}>
                                            SUPERVISOR</option>
                                        <option value="STAFF"{{ $edit->jabatan == 'STAFF' ? 'selected' : '' }}>STAFF
                                        </option>
                                        <option
                                            value="ADMINISTRASI"{{ $edit->jabatan == 'ADMINISTRASI' ? 'selected' : '' }}>
                                            ADMINISTRASI</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="status_pegawai">Status Pegawai </label>
                                    <select class="form-control input-sm required" name="status_pegawai" id="status_pegawai"
                                        value="{{ $edit->status_pegawai }}">
                                        <option value="PNS"{{ $edit->status_pegawai == 'PNS' ? 'selected' : '' }}>PNS
                                        </option>
                                        <option value="MUTASI"{{ $edit->status_pegawai == 'MUTASI' ? 'selected' : '' }}>
                                            MUTASI</option>
                                        <option
                                            value="PEGAWAI TETAP"{{ $edit->status_pegawai == 'PEGAWAI TETAP' ? 'selected' : '' }}>
                                            KARYAWAN TETAP</option>
                                        <option
                                            value="PEGAWAI KONTRAK"{{ $edit->status_pegawai == 'PEGAWAI KONTRAK' ? 'selected' : '' }}>
                                            PEGAWAI KONTRAK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="no_telp">Nomor Telepon</label>
                                    <input id="no_telp" name="no_telp" class="form-control input-sm" type="text"
                                        placeholder="Nomor Telepon" value="{{ $edit->no_telp }}" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="agama">Agama </label>
                                    <select class="form-control input-sm required" id="agama" name="agama"
                                        value="{{ $edit->agama }}" required>
                                        <option value="">Pilih Agama </option>
                                        <option value="ISLAM"{{ $edit->agama == 'ISLAM' ? 'selected' : '' }}>ISLAM
                                        </option>
                                        <option value="KRISTEN"{{ $edit->agama == 'KRISTEN' ? 'selected' : '' }}>KRISTEN
                                        </option>
                                        <option value="KHATOLIK"{{ $edit->agama == 'KATHOLIK' ? 'selected' : '' }}>
                                            KHATOLIK
                                        </option>
                                        <option value="HINDU"{{ $edit->agama == 'HINDU' ? 'selected' : '' }}>HINDU
                                        </option>
                                        <option value="BUDHA"{{ $edit->agama == 'BUDHA' ? 'selected' : '' }}>BUDHA
                                        </option>
                                        <option
                                            value="KEPERCAYAAN PADA TUHAN YME/LAINNYA"{{ $edit->agama == 'KEPERCAYAAN PADA TUHAN YME/LAINNYA' ? 'selected' : '' }}>
                                            KEPERCAYAAN PADA TUHAN
                                            YME/LAINNYA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin </label>
                                    <select class="form-control input-sm" name="gender" id="gender"
                                        value="{{ $edit->gender }}" required>
                                        <option value="">Pilih Jenis Kelamin </option>
                                        <option value="LAKI-LAKI"{{ $edit->gender == 'LAKI-LAKI' ? 'selected' : '' }}>
                                            LAKI-LAKI</option>
                                        <option value="PEREMPUAN"{{ $edit->gender == 'PEREMPUAN' ? 'selected' : '' }}>
                                            PEREMPUAN</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea id="alamat" name="alamat" class="form-control input-sm" rows="3" placeholder="Alamat Pegawai">{{ $edit->alamat }}</textarea>
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
