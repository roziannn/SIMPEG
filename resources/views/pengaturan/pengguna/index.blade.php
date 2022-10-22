@extends('layouts.master')

@section('title')
    Data Pengguna
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
        <div class="col-md-12">
            {{-- alert data berhasil terhapus --}}
            @if (session()->has('successDelete'))
                <div class="box-body">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        {{ session('successDelete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    </div>
                </div>
            @endif
            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="btn-group btn-group-vertical">
                        <a href="/data-pegawai/tambah_data_pegawai" class="btn btn-social btn-flat btn-success btn-xs"
                            title="Tambah Data">
                            <i class="fa fa-plus"></i> Tambah Pengguna
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
                                            <th width="10%" style="text-align: center">Email</th>
                                            <th style="text-align: center">Hak Akses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td style="width: 10%">
                                                    <a href="#" class="btn-sm btn-info" data-toggle="modal"
                                                        data-target="#modal-info{{ $item->id }}"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a href="#" class="btn-sm btn-danger" data-toggle="modal"
                                                        data-target="#modal-danger{{ $item->id }}"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                                <td>{{ $item->nip }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td></td>
                                                <td>{{ $item->roles }}</td>
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
        {{-- danger modal --}}
        @foreach ($data as $item)
            <div class="modal modal-danger fade" id="modal-danger{{ $item->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Hapus Akun</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('delete-pengguna/' . $item->id) }}" method="GET">
                                {{ csrf_field() }}
                                <p>Yakin ingin menghapus?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline">Hapus</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                stateSave: true
            });
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
