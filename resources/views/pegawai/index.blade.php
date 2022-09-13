@extends('layouts.master')

@section('title')
    Data Pegawai
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
                    <a href="add-data-pegawai" class="btn btn-social btn-flat btn-success btn-xs"><i class="fa fa-plus"></i> Tambah Data Pegawai</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')



@endpush