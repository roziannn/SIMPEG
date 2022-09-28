@extends('layouts.master')
<link rel="icon" href="">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('title')
    Form Pegawai Penerima Vaksin
@endsection

@push('css')
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"> --}}
@endpush



<style>
    .form-horizontal .control-label-left-left {
        text-align: left;
    }
</style>
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="btn-group btn-group-vertical">
                <a href="/data-vaksin"
                    class="btn btn-social btn-flat btn-info btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                    title="Kembali Ke Data Vaksin"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Data Vaksin</a>
            </div>
        </div>

        @if (session()->has('success'))
            <div class="box-body">
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
            </div>
        @endif

        <form action="/store-data-penerima-vaksin" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label class="control-label-left col-sm-3" for="nama">NIP</label>
                    <div class="col-sm-3">
                        <select class="form-control input-group-sm select2" id='nip' name="nip" required>
                            <option>-- Cari NIP Pegawai --</option>
                            @foreach ($data as $d)
                                <option>{{ $d->nip }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label-left col-sm-3">Vaksin Dosis 1</label>
                    <div class="col-sm-3">
                        <div class="input-group input-group-sm date">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i> Tanggal Vaksin
                            </div>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    {{-- <div class="col-sm-3">
                        <div class="input-group input-group-sm date" >
                            <div class="input-group-addon">Jenis Vaksin</div>
                            <select class="form-control select2"  data-placeholder="-- Pilih Jenis Vaksin --" id="jenis_vaksin_1" name="jenis_vaksin_1" data-select2-id="jenis_vaksin_1" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="17">-- Pilih Jenis vaksin -- </option>
                                <option value="Covovax" data-select2-id="18">Covovax</option>
                                <option value="Zififax" selected="selected" data-select2-id="4">Zififax</option>
                                <option value="Sinovac" data-select2-id="19">Sinovac</option>
                                <option value="AstraZeneca" data-select2-id="20">AstraZeneca</option>
                                <option value="Sinopharm" data-select2-id="21">Sinopharm</option>
                                <option value="Moderna" data-select2-id="22">Moderna</option>
                                <option value="Pfizer" data-select2-id="23">Pfizer</option>
                                <option value="Novavax" data-select2-id="24">Novavax</option>
                                <option value="Johnson&amp;Johnson" data-select2-id="25">Johnson&amp;Johnson</option>
                                <option value="Biofarma" data-select2-id="26">Biofarma</option>
                            </select>
                        </div>
                    </div> --}}
                </div>

                <div class="form-group">
                    <label class="control-label-left col-sm-3" for="lama_terbilang">Vaksin Dosis 2</label>
                    <div class="col-sm-3">
                        <div class="input-group input-group-sm date">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i> Tanggal Vaksin
                            </div>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
             
                <div class="form-group">
                    <label class="control-label-left col-sm-3" for="lama_terbilang">Vaksin Dosis 3</label>
                    <div class="col-sm-3">
                        <div class="input-group input-group-sm date">
                            <span class="input-group-addon">
                                <input type="checkbox">
                            </span>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i> Tanggal Vaksin
                            </div>
                            <input type="date" class="form-control">
                        </div>
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
            $("#nip").select2({
                placeholder: "search here",
            });
        });
    </script>

     <script type="text/javascript">
        $(document).ready(function() {
            $("#jenis_vaksin_1").select2({
                placeholder: "search here",
            });
        });
    </script>
@endpush
