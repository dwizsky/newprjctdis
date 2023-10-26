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


    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Users</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pengguna.store') }}" method="POST">
            @csrf
            <div class=" card-body">
                <div class="form-group">
            <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder=" Nama Lengkap" required value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="JohnDoe@example.com" required value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <!-- /.card-body -->


            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
