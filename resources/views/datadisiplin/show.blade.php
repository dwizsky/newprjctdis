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


    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Disiplin</h3>
        </div>
        <!-- /.card-header -->



        
        <div class=" card-body">
            <table>
                <tr>
                    <th>Nama Pegawai</th>
                    <td>:</td>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr>
                    <th>Nip</th>
                    <td>:</td>
                    <td>{{ $data->nip }}</td>
                </tr>
                <tr>
                    <th>Pangkat Golongan</th>
                    <td>:</td>
                    <td>{{ $data->pangkat_gol }}</td>
                </tr>
                <tr>
                    <th>Unit Kerja</th>
                    <td>:</td>
                    
                    <td>{{ $data->tambahinstansi->name }}</td>
                </tr>
                <tr>
                    <th>Jenis Hukuman</th>
                    <td>:</td>
                    
                    <td>{{ $data->jenishukumen->JenisHukuman}}</td>
                </tr>
                <tr>
                    <th>No Keputusan</th>
                    <td>:</td>
                    <td>{{ $data->no_keputusan }}</td>
                </tr>
                <tr>
                    <th>Tanggal Penjatuhan Hukuman</th>
                    <td>:</td>
                    <td>{{ $data->tgl_penjatuhan }}</td>
                </tr>
                <tr>
                    <th>Pejabat Yang Menandatangani</th>
                    <td>:</td>
                    <td>{{ $data->penandatangan }}</td>
                </tr>
                <tr>
                    <th>Dokumen</th>
                    <td>:</td>
                    <td>{{ $data->file }}</td>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->


    </div>
</div>
@endsection
