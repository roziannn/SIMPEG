@extends('layouts.master')
<link rel="icon" href="">

@section('title')
    Rekap Penerima Vaksin 
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.css" />
@endpush

<style>
    .table,
    .sidebar,
    .pagination {
        font-size: 13px;
    }

    .table {
        text-align: center;
    }
</style>

@section('content')
    <div class="row">

        {{-- content-menu-li --}}
        <div class="col-md-4 col-lg-3">
            <div class="box box-info">
                <div class="box-body no-padding">
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="/data-vaksin">Daftar Penerima Vaksin</a></li>
                            <li><a href="/data-vaksin/rekap_vaksin">Rekap Penerima Vaksin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- table --}}
        <div class="col-md-4 col-lg-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <a href="#" title="Tambah Daftar Penerima"
                        class="btn btn-social btn-flat bg-olive btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i
                            class="fa fa-plus"></i> Tambah Data</a>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="table-data"
                                        class="table table-bordered dataTable table-striped  table-hover">
                                        <thead class="bg-gray color-palette">
                                            <tr>
                                                <th>No</th>
                                                <th>Aksi</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>Unit Kerja</th>
                                                <th>Nomor Telepon</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
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
    </div>
@endsection
