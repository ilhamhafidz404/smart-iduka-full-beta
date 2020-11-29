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
        <h3 class="card-title">List Lamaran kerja saya</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover table-sm table-striped" id="table-lamaran">
          <thead class="table-primary">
            <tr>
              <th>No</th>
              <th>Nama Perusahaan</th>
              <th>Judul Loker</th>
              <th>Sebagai</th>
              <th>lokasi</th>
              <th>Tanggal Melamar</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
          @foreach($lamaran as $lmr)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$lmr->company->name}}</td>
              <td><a style="color:black;" href="{{route('detail.lowongan-kerja',$lmr->post->slug)}}" target="_blank"> {{$lmr->post->title}} </a></td>
              <td>{{$lmr->post->sbg}}</td>
              <td>{{$lmr->post->lokasi}}</td>
              <td>{{$lmr->created_at->isoFormat('D MMMM Y')}}</td>
              <td>
                @if($lmr->status == 'success')
                <span class="badge badge-success">lulus</span>
                @endif
                @if($lmr->status == 'process')
                <span class="badge badge-warning">Interview</span>
                @endif
                @if($lmr->status == 'pending')
                <span class="badge badge-warning">pending</span>
                @endif
                @if($lmr->status == 'failed')
                <span class="badge badge-danger">tidak lulus</span>
                @endif

              </td>
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