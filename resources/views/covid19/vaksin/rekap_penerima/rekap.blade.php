@extends('layouts.master')
<link rel="icon" href="">

@section('title')
    Rekap Penerima Vaksin
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.css" />
@endpush

@section('content')
    <div class="row">

        {{-- content-menu-li --}}
        <div class="col-md-4 col-lg-3">
            <div class="box box-info">
                <div class="box-body no-padding">
                    <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                            <li><a href="/data-vaksin">Daftar Penerima Vaksin</a></li>
                            <li class="active"><a href="/data-vaksin/rekap_vaksin">Rekap Penerima Vaksin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- table --}}
        <div class="col-md-4 col-lg-9">
            <div class="box box-info">
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table id="table-data" class="table table-bordered dataTable table-striped  table-hover" style="width:100%">
                                        <thead class="bg-gray color-palette">
                                            <tr>
                                                <th style="text-align:center" rowspan="3">No</th>
                                                <th style="text-align:center" rowspan="3">Unit Kerja</th>
                                            </tr>
                                            <tr>
                                                <td  style="text-align:center" colspan="1">Sudah Vaksin</td>
                                                <td  style="text-align:center">Belum Vaksin</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1 @endphp
                                            @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $item->unitkerja_nama }}</td>
                                                <td>{{ $item->sudah_vaksin }}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <th style="text-align:center" colspan="2">Total</th>

                                                @foreach ( $total_1 as $item )
                                                <th style="text-align:center" >{{ $item->total_sudah_vaksin }}</th>
                                                @endforeach

                                                @foreach ( $total_2 as $item )
                                                <th style="text-align:center" >{{ $item->total_belum_vaksin }}</th>
                                                @endforeach
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

<style>
    table {
        border-spacing: 0;
    }
</style>
