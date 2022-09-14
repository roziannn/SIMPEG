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
                                class="fa fa-plus"></i> Tambah Data Pegawai</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <section class="table-responsive">
                                <div class="box-body">
                                    <table id="myTable" class="table table-stiped table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Nomor NIP</th>
                                                <th>Nama</th>
                                                <th>Unit Kerja</th>
                                                <th>Jabatan</th>
                                                <th>Status Pegawai</th>
                                                <th>Nomor Telepon</th>
                                                <th>Agama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1 @endphp
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
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
                            </section>
                        </div>
                    </div>
                </div>
            </div>
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
