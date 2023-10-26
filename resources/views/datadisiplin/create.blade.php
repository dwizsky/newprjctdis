@extends('layouts.template')
@section('judulh1','Admin - Disiplin')


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
            <h3 class="card-title">Tambah Data Pegawai</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('datadisiplin.store') }}" enctype="multipart/form-data" method="POST">
            @csrf


            <div class=" card-body">
                <div class="form-group">
                    <label for="name">Nama Pegawai</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="">
                </div>
                <div class="form-group">
                    <label for="nip">Nip</label>
                    <input type="text" class="form-control" id="nip" name="nip">
                </div>


                <div class="form-group">
                    <label>Instansi</label>
                    <select class="form-control" name="tambahinstansi_id">
                        @foreach($data as $dt )
                        <option value="{{ $dt->id }}">{{ $dt->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pangkat_gol">Pangkat Gol</label>
                    <input type="text" class="form-control" id="pangkat_gol" name="pangkat_gol">
                </div>
                <!-- <div class="form-group">
                    <label for="pangkat_gol">Pangkat Golongan</label>
                    <select class="form-control">
                        <option value="vi/a">vi/a</option>
                        <option value="vi/b">vi/b</option>
                        <option value="vi/c">vi/c</option>
                    </select>
                </div> -->
                <div class="form-group">
                    <label>Jenis Hukuman</label>
                    <select class="form-control" name="jenishukumen_id">
                        @foreach($tmbh as $tb )
                        <option value="{{ $tb->id }}">{{ $tb->JenisHukuman }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="no_keputusan">No Keputusan</label>
                    <input type="text" class="form-control" id="no_keputusan" name="no_keputusan">
                </div>
                <div class="form-group">
                    <label for="tgl_penjatuhan">Tanggal Penjatuhan Hukuman</label>
                    <input type="date" class="form-control" id="tgl_penjatuhan" name="tgl_penjatuhan">
                </div>
                <div class="form-group">
                    <label for="penandatangan">Pejabat Yang Menandatangani</label>
                    <input type="text" class="form-control" id="penandatangan" name="penandatangan">
                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                </div> -->
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <div class="form-group">
                    <label for="file">File Input</label>

                    <div class="col-md-8">
                        <input type="file" class="form-control" name="file" value="{{ old('file') }}">
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
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
