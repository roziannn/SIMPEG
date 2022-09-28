@extends('layouts.master')
<link rel="icon" href="">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('title')
    Tambahkan Pegawai Penerima Vaksin
@endsection

@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.3/select2.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush



<style>
    .form-horizontal .control-label-left-left {
        text-align: left;
    }
</style>
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <a href="/data-vaksin"
                class="btn btn-social btn-flat btn-info btn-xs visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                title="Kembali Ke Data Vaksin"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Data Vaksin</a>
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
                    <label class="control-label-left col-sm-3" for="nama">Nama</label>
                    <div class="col-sm-3">
                        <select class="js-example-responsive" style="width: 100%"  id='nama' name="nama" onchange="nama_pegawai()" required>
                            <option>-- NAMA PEGAWAI --</option>
                            @foreach ($data as $d)
                                <option>{{ Str::upper($d->nama) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label-left-left">Jabatan</label>
                    <div class="col-sm-3">
                        <input class="typeahead form-control input-sm required" maxlength="100" placeholder="Jabatan"
                            id="jabatan" name="jabatan" type="text">
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

@push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.3/select2.min.js"></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $("#nama").select2({
                placeholder: "search here",
            });
        });
    </script>
   
    <script type="text/javascript">
        function nama_pegawai() {
            var nama = $("#nama").val();
            $.ajax({
                type: "POST",
                url: '{{route('jabatan_pegawai')}}',
                data: "nama=" + nama,
                dataType: 'json',
                success: function(data) {
                    $("#jabatan").val(data.jabatanKu);
                }
            })
        }
    </script>
@endpush
