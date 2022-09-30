@extends('layouts.master')

@section('title')
    Pengaduan Pegawai
    <small>Daftar Data</small>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.css" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12" id="allstatus">
            <div class="info-box bg-default">
                <span class="info-box-icon"><i class="fa fa-info fa-nav"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Semua</span>
                    @foreach ($total as $sum)
                        <span class="info-box-number"><?php echo $sum->sum_total; ?></span>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <span class="progress-description">Total bulan ini: <b><?php echo $sum->sum_month?></b></span>
                    @endforeach 
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" id="status1">
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-info fa-nav"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Menunggu Diproses</span>
                    <span class="info-box-number">2</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 66.666666666667%"></div>
                    </div>
                    <span class="progress-description">Total bulan ini: <b>2</b></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" id="status2">
            <div class="info-box bg-blue">
                <span class="info-box-icon"><i class="fa fa-info fa-nav"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Sedang Diproses</span>
                    <span class="info-box-number">0</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 0%"></div>
                    </div>
                    <span class="progress-description">Total bulan ini: <b>0</b></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" id="status3">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-info fa-nav"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Selesai Diproses</span>
                    <span class="info-box-number">1</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 33.333333333333%"></div>
                    </div>
                    <span class="progress-description">Total bulan ini: <b>1</b></span>
                </div>
            </div>
        </div>
    </div>
    <div id="maincontent"></div>
    <div class="box box-info">
        <div class="box-header with-border">
            <a href="/pengaduan-create" title="Hapus Data"
                class="btn btn-social btn-flat btn-success btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                <i class="fa fa-plus"></i>Tambah Pengaduan
            </a>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <div class="dataTables_wrapper for m-inline dt-bootstrap no-footer">
                    <div class="table-responsive table-min-height" style="padding-bottom: 0px">
                        <div class="box-body">
                            <table id="myTable" class="table table-stiped table-bordered ">
                                <thead class="bg-gray disabled color-palette">
                                    <tr>
                                        <th width="3%" style="text-align: center">No</th>
                                        <th width="5%" style="text-align: center">Action</th>
                                        <th width="10%" style="text-align: center">Token</th>
                                        <th width="10%" style="text-align: center">NIP</th>
                                        <th style="text-align: center">Nama</th>
                                        <th style="text-align: center">Unit Kerja</th>
                                        <th style="text-align: center">Judul</th>
                                        <th width="12%" style="text-align: center">Tanggal Pengaduan</th>
                                        <th style="text-align: center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i=1 @endphp
                                    @foreach ($pengaduan as $item)
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
                                                                class="btn btn-social btn-flat btn-block btn-xs"data-toggle="modal"
                                                                data-target="#modal-danger{{ $item->nip }}"><i
                                                                    class="fa fa-trash"></i>Hapus
                                                                Data
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td>{{ $item->token }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->unitkerja_nama }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->status }}</td>
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
                            <form action="{{ url('pengaduan-delete/' . $item->id) }}" method="GET">
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
@endpush
