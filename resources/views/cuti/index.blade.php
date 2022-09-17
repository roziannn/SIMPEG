@extends('layouts.master')
<link rel="icon" href="">

@section('title')
    Data Cuti Pegawai
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.css" />
@endpush

<style>
    .table,
    .sidebar, .pagination {
        font-size: 13px;
    }
    .table {
        text-align: center;
    }
</style>

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <a href="/tambah-data-cuti"
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
                                    <th style="text-align: center">No</th>
                                    <th style="text-align: center">Aksi</th>
                                    <th style="text-align: center">Nama</th>
                                    <th style="text-align: center">Jabatan</th>
                                    <th style="text-align: center">Unit Kerja</th>
                                    <th style="text-align: center">Jenis Cuti</th>
                                    <th style="text-align: center">Tanggal Mulai</th>
                                    <th style="text-align: center">Tanggal Selesai</th>
                                    <th style="text-align: center">Lama Terbilang</th>
                                    <th style="text-align: center">Uraian</th>
                                    <th style="text-align: center">Tanggal Pengajuan</th>
                                    <th style="text-align: center">Status Cuti</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1 @endphp
                                @foreach ( $data as $item )
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
                                                                class="fa fa-edit"></i>Ubah Data</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="btn btn-social btn-flat btn-block btn-xs"data-toggle="modal"
                                                            data-target="#modal-danger"><i
                                                                class="fa fa-trash"></i>Hapus Data
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jabatan }}</td>
                                        <td>{{ $item->unitkerja_nama }}</td>
                                        <td>{{ $item->jenis_cuti }}</td>
                                        <td>{{ $item->tgl_mulai }}</td>
                                        <td>{{ $item->tgl_selesai }}</td>
                                        <td>{{ $item->lama_terbilang }}</td>
                                        <td>{{ $item->uraian }}</td>
                                        <td>{{ $item->tgl_pengajuan }}</td>
                                        <td>{{ $item->status }}</td>
                                    </tr>
                                    @endforeach
                            </tbody>
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