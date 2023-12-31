@extends('layouts.template')
@section('judulh1','Admin - User')


@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pengguna.update',$pengguna->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="name">Nama Pengguna</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ $pengguna->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $pengguna->email }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ $pengguna->password }}">
                </div>
            </div>
            <!-- /.card-body -->


            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
