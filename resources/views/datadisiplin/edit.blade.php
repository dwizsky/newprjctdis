@extends('layouts.template')
@section('judulh1','Admin - Data Disiplin')


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
            <h3 class="card-title">Ubah Data Pegawai</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('datadisiplin.update',$datadisiplin->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="name">Nama Pegawai</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder=""
                        value="{{$datadisiplin->name}}">
                </div>
                <div class="form-group">
                    <label for="nip">Nip</label>
                    <input type="number" class="form-control" id="nip" name="nip" value="{{$datadisiplin->nip}}">
                </div>


                <div class="form-group">
                    <label>Instansi</label>
                    <select class="form-control" name="tambahinstansi_id">
                        @foreach($data as $dt )
                        <option value="{{ $dt->id }}" @if($dt->id===$datadisiplin->tambahinstansi_id) selected
                            @endif>{{ $dt->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="pangkat_gol">Pangkat Gol</label>
                    <input type="text" class="form-control" id="pangkat_gol" name="pangkat_gol" value="{{$datadisiplin->pangkat_gol}}">
                </div>
                <div class="form-group">
                    <label>Jenis Hukuman</label>
                    <select class="form-control" name="jenishukuman_id">
                        @foreach($tmbh as $tb )
                        <option value="{{ $tb->id }}" @if($tb->id===$datadisiplin->jenishukuman_id) selected
                            @endif>{{ $tb->JenisHukuman }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="no_keputusan">No Keputusan</label>
                    <input type="text" class="form-control" id="no_keputusan" name="no_keputusan" value="{{$datadisiplin->no_keputusan}}">
                </div>
                <div class="form-group">
                    <label for="tgl_penjatuhan">Tanggal Penjatuhan Hukuman</label>
                    <input type="text" class="form-control" id="tgl_penjatuhan" name="tgl_penjatuhan" value="{{$datadisiplin->tgl_penjatuhan}}">
                </div>
                <div class="form-group">
                    <label for="penandatangan">Pejabat yang Menandatangani</label>
                    <input type="text" class="form-control" id="penandatangan" name="penandatangan" value="{{$datadisiplin->penandatangan}}">
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
                <div class="col-md-8">
                        <input type="file" class="form-control" name="file" value="{{ old('file') }}">
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
            </div>
            <!-- /.card-body -->


            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Ubah</button>
            </div>
        </form>
    </div>




</div>




@endsection
