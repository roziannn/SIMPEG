@extends('layouts.master')
<link rel="icon" href="">

@section('title')
    Data Cuti Pegawai
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.css" />
@endpush

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <a href="/pengajuan-cuti"
                class="btn btn-social btn-flat btn-success btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                title="Kembali Ke Daftar Program Bantuan"><i class="fa fa-plus"></i> Tambah Cuti Pegawai</a>
        </div>
        <div class="box-body">
            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <div class="table-responsive table-min-height" style="padding-bottom: 0px">
                    <div class="box-body">
                        <table id="myTable" class="table table-stiped table-bordered ">
                            <thead class="bg-gray disabled color-palette">
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Unit Kerja</th>
                                    <th>Jenis Cuti</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Lama Terbilang</th>
                                    <th>Deskripsi</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Status Cuti</th> 
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">

        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.js"></script>

    {{-- <script>
     $(document).ready(function() {
      setInterval(function() {
       $('#myTable').load('index.blade.php');
      }, 100);
     });
    </script> --}}
@endpush