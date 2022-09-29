@extends('layouts.master')
<link rel="icon" href="">

@section('title')
    Data Vaksinasi Covid-19
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
                            <li class="active"><a href="/data-vaksin">Daftar Penerima Vaksin</a></li>
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
                    <div class="btn-group btn-group-vertical">
                        <a href="/data-vaksin/form" title="Tambah Daftar Penerima"
                            class="btn btn-social btn-flat bg-olive btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i
                                class="fa fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="myTable"
                                        class="table table-bordered dataTable table-striped  table-hover">
                                        <thead class="bg-gray color-palette">
                                            <tr>
                                                <th style="text-align:center">No</th>
                                                <th style="text-align:center">Aksi</th>
                                                <th style="text-align:center">NIP</th>
                                                <th style="text-align:center">Nama</th>
                                                <th style="text-align:center">Jabatan</th>
                                                <th style="text-align:center">Unit Kerja</th>
                                                <th style="text-align:center">Nomor Telepon</th>
                                                <th style="text-align:center">Alamat</th>
                                                <th style="text-align:center">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1 @endphp
                                            @foreach ($penerima as $item)
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
                                                                        class="btn btn-social btn-flat btn-block btn-xs"
                                                                        data-toggle="modal"
                                                                        data-target="#modal-info{{ $item->nip }}"><i
                                                                            class="fa fa-edit"></i>Ubah Data</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"
                                                                        class="btn btn-social btn-flat btn-block btn-xs"data-toggle="modal"
                                                                        data-target="#modal-danger{{ $item->nip }}"><i
                                                                            class="fa fa-trash"></i>Hapus Data
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                    <td>{{ $item->nip }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->jabatan }}</td>
                                                    <td>{{ $item->unitkerja_nama }}</td>
                                                    <td>{{ $item->no_telp }}</td>
                                                    <td>{{ $item->alamat }}</td>
                                                    @if($item->vaksin3 != null)
                                                        <td>Sudah Vaksin ke 3</td>
                                                    @elseif($item->vaksin2 != null)
                                                        <td>Sudah Vaksin ke 2</td>
                                                    @elseif($item->vaksin1 != null)
                                                        <td>Sudah Vaksin ke 1</td>
                                                    @else
                                                        <td></td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- danger modal --}}
                @foreach ($data as $item)
                    <div class="modal modal-danger fade" id="modal-danger{{ $item->nip }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Konfirmasi</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('delete-penerima/' . $item->id) }}" method="GET">
                                        {{ csrf_field() }}
                                        <p>Yakin ingin menghapus data?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline">Hapus</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
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
@endpush
