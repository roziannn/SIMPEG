@extends('layouts.master')
<link rel="icon" href="img/jabar.png">

@section('title')
    Add New
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.12.1/datatables.min.css"/>
@endpush

@section('content')

<div class="row">
  <!-- left column -->
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Tambahkan User Baru</h3>
      </div>
      
      @if(session()->has('success'))
      <div class="box-body">
        <div class="alert alert-success alert-dismissible" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
      </div>
      @endif

      <form action="add-new-user" method="POST">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="nip">NIP</label>
            <input type="nip" name="nip" class="form-control" id="nip" placeholder="NIP">
          </div>
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="nama" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password">

            </div>
            <div class="check">
              <input type="checkbox" onclick="myFunction()"> Show Password
            </div>
            <script>
            function myFunction() {
              var x = document.getElementById("password");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
            </script>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Buat Akun Baru</button>
        </div>
      </form>
    </div>
    <!-- /.box -->
  </div>

  <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">All User <small> Active</small></h3>
      </div>

      @if(session()->has('successDelete'))
      <div class="box-body">
        <div class="alert alert-danger alert-dismissible" role="alert">
          {{ session('successDelete') }}
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
      </div>
      @endif

      <div class="box-body">
        <table id="myTable" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">Nama</th>
              <th scope="col">NIP</th>
              <th scope="col">Hak Akses</th>
              <th scope="col"></th>
            </tr>
          </thead>

          @if(session('update_success'))
          <div class="alert alert-success alert-dismissable" role="alert">
            {{ session('update_success') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          </div>
        </div>
        @endif

          <tbody>
            @foreach ($show_all as $item)
              <tr>
                <td>{{ $item->nama }}</td> 
                <td>{{ $item->nip }}</td>
                <td>{{ $item->roles }}</td>
                <td>
                  <a href="#" class="btn-sm btn-info" data-toggle="modal" data-target="#modal-info{{ $item->id }}"><i class="fa fa-edit"></i></a>
                  <a href="#" class="btn-sm btn-danger" data-toggle="modal" data-target="#modal-danger{{ $item->id }}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

{{-- danger modal --}}
@foreach ($show_all as $item)
<div class="modal modal-danger fade" id="modal-danger{{ $item->id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Akun</h4>
        </div>
        <div class="modal-body">
          <form action="{{ url('/delete'. $item->id) }}" method="GET">
            {{ csrf_field() }}
            <p>Yakin ingin menghapus?</p>
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
  
{{-- MODAL POP UP --}}
  @foreach ($show_all as $data)
  <div class="modal modal-default fade" id="modal-info{{ $data->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit User Account</h4>
        </div>

        <div class="modal-body">
          <form action="{{ url('edit'. $data->id) }}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="nama">Nama Lengkap</label>
              <input type="nama" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="{{ $data->nama }}">
            </div>
            <div class="form-group">
              <label for="nip">NIP</label>
              <input type="nip" name="nip" class="form-control" id="nip" placeholder="NIP" value="{{ $data->nip }}">
            </div>

            <div class="form-group">
              <label for="roles">Hak Akses</label>
              <select class="form-control" name="roles" arial-label="Select example">
                <option selected value="{{ $data->roles }}">{{ $data->roles }}</option>
                <option>--HAK AKSES--</option>
                <option value="ADMIN">ADMIN</option>
                <option value="USER">USER</option>
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
</div>
@endsection