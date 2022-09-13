@extends('layouts.master')

@section('title')
    Tambah Data Pegawai
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.css"/>
@endpush

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">

            </div>
            <div class="box-body">
                <div class="btn-group btn-group-vertical">
                    <a href="/data-pegawai" class="btn btn-social btn-flat btn-warning btn-xs"><i class="fa fa-arrow-circle-o-left"></i> Kembali ke Data Pegawai</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')



@endpush