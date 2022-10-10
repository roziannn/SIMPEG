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
                    @endforeach
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    @foreach ($this_month as $month)
                        <span class="progress-description">Total bulan ini: <b><?php echo $month->sum_month; ?></b></span>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" id="status1">
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-info fa-nav"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Menunggu Diproses</span>
                    @foreach ($total1 as $sum)
                        <span class="info-box-number"><?php echo $sum->sum_menunggu; ?></span>
                    @endforeach
                    <div class="progress">
                        <div class="progress-bar" style="width: 66.666666666667%"></div>
                    </div>
                    @foreach ($this_month1 as $sum)
                        <span class="progress-description">Total bulan ini: <b><?php echo $sum->this_month1; ?></b></span>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" id="status2">
            <div class="info-box bg-blue">
                <span class="info-box-icon"><i class="fa fa-info fa-nav"></i></span>
                <div class="info-box-content">
                    @foreach ($total2 as $sum)
                        <span class="info-box-text">Sedang Diproses</span>
                        <span class="info-box-number"><?php echo $sum->sum_sedang_proses; ?></span>
                    @endforeach
                    <div class="progress">
                        <div class="progress-bar" style="width: 0%"></div>
                    </div>
                    @foreach ($this_month2 as $sum)
                        <span class="progress-description">Total bulan ini: <b><?php echo $sum->this_month2; ?></b></span>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" id="status3">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-info fa-nav"></i></span>
                <div class="info-box-content">
                    @foreach ($total3 as $sum)
                        <span class="info-box-text">Selesai Diproses</span>
                        <span class="info-box-number"><?php echo $sum->sum_selesai; ?></span>
                    @endforeach
                    <div class="progress">
                        <div class="progress-bar" style="width: 33.333333333333%"></div>
                    </div>
                    @foreach ($this_month3 as $sum)
                        <span class="progress-description">Total bulan ini: <b><?php echo $sum->this_month3; ?></b></span>
                    @endforeach
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
                                                                class="btn btn-social btn-flat btn-block btn-xs"
                                                                data-toggle="modal"
                                                                data-target="#modal-show{{ $item->nip }}"><i
                                                                    class="fa fa-list-ol"></i>Lihat Detail</a>
                                                        </li>
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
                                            <td>
                                                @if ($item->status == 'Menunggu Diproses')
                                                    <span class="label label-danger">Menunggu</span>
                                                @elseif($item->status == 'Sedang Diproses')
                                                    <span class="label label bg-blue">Diproses</span>
                                                @elseif($item->status == 'Selesai Diproses')
                                                    <span class="label label-success">Selesai</span>
                                                @endif
                                            </td>
                                            <style>
                                                tbody tr td {
                                                    text-align: center;
                                                }
                                            </style>
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

    {{-- MODAL POP UP SHOW --}}
    @foreach ($data as $item)
        <div class="modal modal-default fade" id="modal-show{{ $item->nip }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tampilkan Detail</h4>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('edit-pengaduan/' . $item->id) }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="nama">Nama Pelapor</label>
                                <input type="nama" name="nama" class="form-control" id="nama"
                                    placeholder="Nama Lengkap" value="{{ $item->nama }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Unit Kerja</label>
                                <input type="nama" name="nama" class="form-control" id="nama"
                                    placeholder="Nama Lengkap" value="{{ $item->unitkerja_nama }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Keterangan</label>
                                <textarea type="nama" rows="4" class="form-control" id="keterangan" value="" disabled>{{ $item->keterangan }}</textarea>
                            </div>
                            {{-- END MODAL-BODY --}}

                            {{-- komentar --}}
                            <hr style="border-top: 1px solid #eee; margin:20px; border:0;">
                            <div class="row support-content-comment">
								<div class="col-md-12">
									<p>Diupdate oleh <a href="#">Admin</a> | 2022-10-10 05:49:09</p>
									{{-- <p>sip</p> --}}
								</div>
							</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- MODAL POP UP EDIT --}}
    @foreach ($data as $item)
        <div class="modal modal-default fade" id="modal-info{{ $item->nip }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tanggapi Pengaduan</h4>
                    </div>

                    <div class="modal-body">
                        <form action="{{ url('edit-pengaduan/' . $item->id) }}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="nama">Nama Pelapor</label>
                                <input type="nama" name="nama" class="form-control" id="nama"
                                    placeholder="Nama Lengkap" value="{{ $item->nama }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="nama">Status Pengaduan</label>
                                <select class="form-control input-sm required" placeholder="pilih kategori"
                                    name="status" id="status">
                                    <option
                                        value="Menunggu Diproses"{{ $item->status == 'Menunggu Diproses' ? 'selected' : '' }}>
                                        Menunggu Diproses</option>
                                    <option
                                        value="Sedang Diproses"{{ $item->status == 'Sedang Diproses' ? 'selected' : '' }}>
                                        Sedang Diproses</option>
                                    <option
                                        value="Selesai Diproses"{{ $item->status == 'Selesai Diproses' ? 'selected' : '' }}>
                                        Selesai Diproses</option>
                                </select>
                            </div>

                            {{-- END MODAL-BODY --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
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
            $('#myTable').DataTable({
                stateSave: true
            });
        });
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.js"></script>
@endpush
