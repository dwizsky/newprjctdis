@extends('layouts.template')
@section('tambahanCSS')
<!-- DataTables -->
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!-- Toastr -->
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection


@section('judulh1','Admin - Data Disiplin')


@section('konten')






<div class="col-md-12">
    <div class="card card-info">
        <div class="card-header">
            <h2 class="card-title">Data Pegawai</h2>
            <a type="button" class="btn btn-success float-right" href="{{ route('datadisiplin.create') }}">
                <i class=" fas fa-plus"></i> Tambah Data
            </a>
        </div>
        <!-- /.card-header -->


        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nip</th>
                        <th>Instansi</th>
                        <th>Pangkat Gol</th>
                        <th>Dokumen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach($data as $dt)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dt->name }}</td>
                        <td>{{ $dt->nip }}</td>
                        <td>{{ $dt->tambahinstansi->name }}</td>
                        <td>{{ $dt->pangkat_gol }}</td>
                        <td>{{ $dt->file }}</td>
                        <td>
                            <div class="btn-group">
                                <form action="{{ route('datadisiplin.destroy',$dt->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class=" fas fa-trash"></i>
                                    </button>


                                </form>


                                <a type="button" class="btn btn-warning" href="{{ route('datadisiplin.edit',$dt->id) }}">
                                    <i class=" fas fa-edit"></i>
                                </a>
                                <a type="button" class="btn btn-success" href="{{ route('datadisiplin.show',$dt->id) }}">
                                    <i class=" fas fa-eye"></i>
                                </a>
                            </div>




                        </td>
                    </tr>


                    @endforeach
                </tbody>
            </table>


        </div>




    </div>
</div>
@endsection


@section('tambahanJS')
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


@endsection


@section('tambahScript')
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "responsive": true,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
});


@if($message = Session::get('success'))
toastr.success("{{ $message}}");
@elseif($message = Session::get('updated'))
toastr.warning("{{ $message}}");
@elseif($message = Session::get('deleted'))
toastr.error("{{ $message}}");
@endif
</script>
@endsection
