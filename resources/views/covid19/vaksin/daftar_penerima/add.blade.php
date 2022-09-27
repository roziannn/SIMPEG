@extends('layouts.master')
<link rel="icon" href="">

@section('title')
    Tambahkan Pegawai Penerima Vaksin
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.3/select2.min.css">
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
                    <div class="col-sm-4">
                        <select class="form-control select2-sm required" id='nama' name="nama" required>
                            <option>-- Nama Pegawai --</option>
                            @foreach ($data as $d)
                                <option>{{ Str::upper($d->nama) }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    

                    {{-- <div class="col-sm-4">
                        <input class="typeahead form-control input-sm required" maxlength="100" placeholder="Nama"
                            id="nama" name="nama" type="text" autocomplete="off">
                    </div> --}}
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.3/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#nama").select2({
                placeholder: "search here",
                allowClear: true,
                matcher: function(term, text) {
                    return text.toUpperCase().indexOf(term.toUpperCase()) == 0;
                }
            });
        });
    </script>
@endpush
