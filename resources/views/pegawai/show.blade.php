@extends('layouts.master')

@section('title')
    Biodata Pegawai
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="btn-group btn-group-vertical">
                        <a href="/data-pegawai" class="btn btn-social btn-flat btn-warning btn-xs"><i
                        class="fa fa-arrow-circle-o-left"></i> Kembali ke Data Pegawai</a>
                    </div>
                </div>
                
                <div class="box-body">
                    <div class="row">
                        
                        <div class="col-md-12">
                            <div class="box-header with-border">
                                <h3 class="box-title">Data Pegawai (NIP : {{ $pegawai->nip }})</h3>
                                <br>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="300">Nama</td>
                                            <td width="1">:</td>
                                            <td><strong>{{ Str::upper($pegawai->nama) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Detail Kepegawaian</td><td>:</td>
                                            <td>
                                                <table class="table table-bordered table-striped table-hover detail">
                                                    <tbody><tr>
                                                        <th>Unit Kerja</th>
                                                        <th>Jabatan</th>
                                                        <th>Status Pegawai</th>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $pegawai->unitkerja_nama }}</td>
                                                        <td>{{ $pegawai->jabatan }}</td>
                                                        <td>{{ $pegawai->status_pegawai }}</td>
                                                    </tr>
                                                </tbody></table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td><td>:</td><td>{{ $pegawai->gender }}</td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td><td>:</td><td>{{ $pegawai->agama }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td><td>:</td><td>{{ $pegawai->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Hp</td><td>:</td><td>{{ $pegawai->no_telp }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
