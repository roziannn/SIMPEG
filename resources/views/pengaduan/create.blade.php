@extends('layouts.master')

@section('title')
    Pengaduan Pegawai
    <small>Form</small>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.css" />
@endpush

@section('content')
<div class="box box-info">
    <div class="box-header with-border">
        <div class="btn-group btn-group-vertical">
            <a href="/pengaduan" class="btn btn-social btn-flat btn-info btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali Ke Data Vaksin"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Data Pengaduan</a>
        </div>
        
    </div>

    <form action="/store-data-penerima-vaksin" method="POST" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label class="control-label-left col-sm-3" for="token">Token</label>
                <div class="col-sm-3">
                    <input name="token" id="token" class="form-control input-sm required" maxlength="50" placeholder="Token" type="text" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label-left col-sm-3" for="nama">Nama</label>
                <div class="col-sm-3">
                    <select class="form-control input-group-sm select2" id='nama' name="nama" required>
                        <option></option>
                        @foreach ($data as $d)
                            <option>{{ $d->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label-left col-sm-3">Vaksin Dosis 1</label>
                <div class="col-sm-3">
                    <select class="form-control input-sm required" placeholder="pilih kategori" name="kategori_pengaduan" id="kategori_pengaduan">
                        <option value="AST">ASET</option>
                        <option value="IND">INDIVIDU</option>
                        <option value="OTR">OTHER</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="box-footer">
            <button type="reset" class="btn btn-social btn-flat btn-danger btn-sm"><i class="fa fa-times"></i>
                Batal</button>
            <button type="submit" class="btn btn-social btn-flat btn-info btn-sm pull-right confirm"><i
                    class="fa fa-check"></i> Simpan</button>
        </div>
    </form>
</div>
@endsection

{{-- field select2 style --}}
<style>
    .select2.select2-container {
        width: 100% !important;
    }

    /* field */
    .select2.select2-container .select2-selection {
        border: 1px solid #ccc;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 1px;
        height: 32px;
        margin-bottom: 15px;
        outline: none !important;
        transition: all .15s ease-in-out;
    }

    .select2.select2-container .select2-selection .select2-selection__rendered {
        color: #333;
        line-height: 32px;
        padding-right: 33px;
    }

    /* arrow */
    .select2.select2-container .select2-selection .select2-selection__arrow {
        background: #f8f8f8;
        border-left: 1px solid #ccc;
        -webkit-border-radius: 0 3px 3px 0;
        -moz-border-radius: 0 3px 3px 0;
        border-radius: 0 3px 3px 0;
        height: 30px;
        width: 33px;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single {
        background: #f8f8f8;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--single .select2-selection__arrow {
        -webkit-border-radius: 0 3px 0 0;
        -moz-border-radius: 0 3px 0 0;
        border-radius: 0 3px 0 0;
    }

    .select2.select2-container.select2-container--open .select2-selection.select2-selection--multiple {
        border: 1px solid #34495e;
    }

    .select2.select2-container .select2-selection--multiple {
        height: auto;
        min-height: 34px;
    }

    .select2.select2-container .select2-selection--multiple .select2-search--inline .select2-search__field {
        margin-top: 0;
        height: 32px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__rendered {
        display: block;
        padding: 0 4px;
        line-height: 29px;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice {
        background-color: #f8f8f8;
        border: 1px solid #ccc;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        margin: 4px 4px 0 0;
        padding: 0 6px 0 22px;
        height: 24px;
        line-height: 24px;
        font-size: 12px;
        position: relative;
    }

    .select2.select2-container .select2-selection--multiple .select2-selection__choice .select2-selection__choice__remove {
        position: absolute;
        top: 0;
        left: 0;
        height: 22px;
        width: 22px;
        margin: 0;
        text-align: center;
        color: #e74c3c;
        font-weight: bold;
        font-size: 16px;
    }

    .select2-container .select2-dropdown {
        background: transparent;
        border: none;
        margin-top: -5px;
    }

    .select2-container .select2-dropdown .select2-search {
        padding: 0;
    }

    .select2-container .select2-dropdown .select2-search input {
        outline: none !important;
        border: 1px solid #34495e !important;
        border-bottom: none !important;
        padding: 4px 6px !important;
    }

    .select2-container .select2-dropdown .select2-results {
        padding: 0;
    }

    .select2-container .select2-dropdown .select2-results ul {
        background: #fff;
        border: 1px solid #34495e;
    }

    .select2-container .select2-dropdown .select2-results ul .select2-results__option--highlighted[aria-selected] {
        background-color: #3498db;
    }
</style>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#nama").select2({
                placeholder: "Cari Nama pegawai",
            });
        });
    </script>
@endpush