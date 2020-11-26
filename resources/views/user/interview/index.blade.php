@extends('layouts.userlayout')

@section('title','Kategori')

@section('nama_halaman','management Loker')

@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('AdminLte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  
    <div class="card mb-3">
      <div class="card-header">
        <h3>List Lamaran kerja saya</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover table-sm table-striped" id="table-lamaran">
          <thead class="table-primary">
            <tr>
              <th>No</th>
              <th>Nama Perusahaan</th>
              <th>Judul Loker</th>
              <th>tempat</th>
              <th colspan="2" >tanggal</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($interview as $inv)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$inv->pelamar->company->name}}</td>
                <td>{{$inv->pelamar->post->title}}</td>
                <td>{{$inv->tempat}}</td>
                <td>{{$inv->tanggal}}</td>
                <td>{{$inv->waktu}}</td>
                @if($inv->status == 'success')
                <td>Telah Interview</td>
                @endif
                @if($inv->status == 'pending')
                <td>Belum Interview</td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>




</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection


<!------------------------------------ BAGIAN JAVASCRIPT ------------------------------------------>


@section('js')

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
    <!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('AdminLte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('AdminLte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    $(document).ready(function() {
    $('#table-lamaran').DataTable();
} );
</script>

@endsection