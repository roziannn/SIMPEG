@extends('layouts.master')

@section('title')
    Data Pegawai
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
                        <a href="add-data-pegawai" class="btn btn-social btn-flat btn-success btn-xs"><i
                                class="fa fa-plus"></i> Tambah Data Pegawai
                        </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="table-responsive table-min-height" style="padding-bottom: 0px">
                            <div class="box-body">
                                <table id="myTable" class="table table-stiped table-bordered ">
                                    <thead class="bg-gray disabled color-palette">
                                        <tr>
                                            <th width="5%" style="text-align: center">No</th>
                                            <th width="5%" style="text-align: center">Action</th>
                                            <th style="text-align: center">NIP</th>
                                            <th width="10%" style="text-align: center">Nama</th>
                                            <th style="text-align: center">Unit Kerja</th>
                                            <th style="text-align: center">Jabatan</th>
                                            <th style="text-align: center">Status</th>
                                            <th style="text-align: center">Nomor Hp</th>
                                            <th style="text-align: center">Agama</th>
                                            <th style="text-align: center">Jenis Kelamin</th>
                                            <th style="text-align: center">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-social btn-flat btn-info btn-xs"
                                                            data-toggle="dropdown" aria-expanded="false"><i
                                                                class="fa fa-arrow-circle-down"></i> Pilih Aksi
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li>
                                                                <a href="#"
                                                                    class="btn btn-social btn-flat btn-block btn-xs"><i
                                                                        class="fa fa-list-ol"></i>Lihat Detail</a>
                                                            </li>
                                                            <li>
                                                                <a href="#"
                                                                    class="btn btn-social btn-flat btn-block btn-xs"><i
                                                                        class="fa fa-edit"></i>Ubah Data</a>
                                                            </li>
                                                            <li>
                                                                <a href="#"
                                                                    class="btn btn-social btn-flat btn-block btn-xs"><i
                                                                        class="fa fa-trash"></i>Hapus Data</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>{{ $item->nip }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->unitkerja_nama }}</td>
                                                <td>{{ $item->jabatan }}</td>
                                                <td>{{ $item->status_pegawai }}</td>
                                                <td>{{ $item->no_telp }}</td>
                                                <td>{{ $item->agama }}</td>
                                                <td>{{ $item->gender }}</td>
                                                <td>{{ $item->alamat }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table, .sidebar {
            font-size: 13px;
        }
        .table {
            text-align: center;
        }
    </style>
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
