@extends('layouts.master')
<link rel="icon" href="">

@section('title')
    Data Cuti Pegawai
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

{{-- datepicker --}}
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <a href="/tambah_data_cuti"
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

                            @if (session('update_success'))
                                <div class="alert alert-warning alert-dismissable" role="alert">
                                    {{ session('update_success') }}
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                </div>
                            @endif

                            <tbody>
                                @php $i=1 @endphp
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-social btn-flat btn-info btn-xs"
                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-arrow-circle-down"></i> Pilih Aksi
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>
                                                        <a href="#" class="btn btn-social btn-flat btn-block btn-xs"
                                                            data-toggle="modal"
                                                            data-target="#modal-info{{ $item->id }}"><i
                                                                class="fa fa-edit"></i>Ubah Data</a>
                                                    </li>
                                                    <li>
                                                        <a href="#"
                                                            class="btn btn-social btn-flat btn-block btn-xs"data-toggle="modal"
                                                            data-target="#modal-danger{{ $item->id }}"><i
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



        {{-- danger modal --}}
        @foreach ($data as $item)
            <div class="modal modal-danger fade" id="modal-danger{{ $item->id }}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Konfirmasi</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('delete-cuti/' . $item->id) }}" method="GET">
                                {{ csrf_field() }}
                                <p>Yakin ingin menghapus data?</p>
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


    {{-- MODAL POP UP --}}
    @foreach ($data as $item)
        <div class="modal modal-default fade" id="modal-info{{ $item->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Data Cuti</h4>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('edit-cuti/' . $item->id) }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="nama" name="nama" class="form-control" id="nama"
                                    placeholder="Nama Lengkap" value="{{ $item->nama }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tgl_post">Tanggal Pengajuan </label>
                                <div class="input-group input-group-sm">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control input-sm pull-right required" id="tgl_pengajuan"
                                        name="tgl_pengajuan" placeholder="Tgl. Pengajuan" type="text"
                                        autocomplete="off" value="{{ $item->tgl_pengajuan }}" readonly>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <label for="tgl_cuti">Tanggal Cuti</label>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-sm date" id="datetimepicker">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right required" id="tgl_mulai" name="tgl_mulai" placeholder="Tgl. Mulai" type="text" value="{{ $item->tgl_mulai }}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group input-group-sm date" id="datetimepicker">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control input-sm pull-right required" id="tgl_selesai" name="tgl_selesai" placeholder="Tgl. Akhir" type="text" value="{{ $item->tgl_selesai }}" autocomplete="off">
                                    </div>
                                </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $('.date').datepicker({
                                    format: 'mm-dd-yyyy'
                                });
                            </script>
                            <div class="form-group">
                                <label for="nama">Lama Terbilang</label>
                                <input type="nama" name="lama_terbilang" class="form-control" id="lama_terbilang"
                                    placeholder="lama_terbilang" value="{{ $item->lama_terbilang }}" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="gender">Status Cuti </label>
                                <select class="form-control input-sm" name="status" id="status"
                                    value="{{ $item->status }}" required>
                                    <option value="">Pilih Status Cuti </option>
                                    <option value="DIAJUKAN"{{ $item->status == 'DIAJUKAN' ? 'selected' : '' }}>
                                        DIAJUKAN</option>
                                    <option
                                        value="DISETUJUI ATASAN"{{ $item->status == 'DISETUJUI ATASAN' ? 'selected' : '' }}>
                                        DISETUJUI ATASAN</option>
                                </select>
                            </div>

                            {{-- END MODAL-BODY --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
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
