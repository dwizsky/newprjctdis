@extends('layouts.template')
@section('judulh1','Admin - Tambah Instansi')
@section('judulh3','Edit Tambah Instansi')
@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Ada Yang salah.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Edit Unit Kerja</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('tambahinstansi.update',$tambahinstansi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="name">Nama Unit Kerja</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$tambahinstansi->name}}">
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" class=" form-control"
                        rows="4"> {{ $tambahinstansi->description }} </textarea>
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
