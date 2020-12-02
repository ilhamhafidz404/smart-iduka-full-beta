@php $id = auth()->user()->id; @endphp
@php
 $pathpasfoto = Storage::url('pasfoto/'.$upload->pasfoto);
 $pathktp = Storage::url('ktp/'.$upload->ktp);
 $pathIjazah = Storage::url('ijazah/'.$upload->ijazah);
 $pathpelar = Storage::url('ijazah/'.$upload->ijazah);
 $skck = Storage::url('skck/'.$upload->skck);
 $skd = Storage::url('skd/'.$upload->skd);
 $cv = Storage::url('cv/'.$upload->cv);



@endphp


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
      <div class="card-header bg-primary">
        <h2 class="card-title">List Lamaran kerja saya</h2>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover table-sm table-striped" id="table-lamaran">
          	<tr>
          		<th>Nama Berkas</th>
          		<th>Status</th>
          		<th>Opsi</th>
          	</tr>
          	<tr>
		<td>Pas Foto</td>
		@if($upload->pasfoto == null)
		<td><span class="badge badge-danger">Belum Diupload</span></td>
	@endif
  	@if($upload->pasfoto != null)
		<td><span class="badge badge-success">Sudah Diupload</span></td>
	@endif
		<td>
			@if($upload->pasfoto == null)
		<a class="btn btn-info btn-sm" href="{{route('upload.pasfoto',$id)}}"><i class="fas fa-upload"></i></a>
	@endif
  	@if($upload->pasfoto != null)
		<a class="btn btn-primary btn-sm" href="{{route('upload.pasfoto',$id)}}"><i class="fas fa-edit"></i></a>
	@endif
			<a class="btn btn-outline-primary btn-sm" href="{{$pathpasfoto}}"><i class="fas fa-eye"></i></a>
		</td>
	</tr>
	<tr>
		<td>KTP</td>
		@if($upload->ktp == null)
		<td><span class="badge badge-danger">Belum Diupload</span></td>
	@endif
  	@if($upload->ktp != null)
		<td><span class="badge badge-success">Sudah Diupload</span></td>
	@endif
		<td>
			@if($upload->pasfoto == null)
		<a class="btn btn-info btn-sm" href="{{route('upload.ktp',$id)}}"><i class="fas fa-upload"></i></a>
	@endif
  	@if($upload->pasfoto != null)
<a class="btn btn-primary btn-sm" href="{{route('upload.ktp',$id)}}"><i class="fas fa-edit"></i></a>
	@endif
			
			<a class="btn btn-outline-primary btn-sm" href="{{$pathktp}}"><i class="fas fa-eye"></i></a>
		</td>	
	</tr>
	<tr>
		<td>Ijazah Terakhir</td>
		@if($upload->ijazah == null)
		<td><span class="badge badge-danger">Belum Diupload</span></td>
	@endif
  	@if($upload->ijazah != null)
		<td><span class="badge badge-success">Sudah Diupload</span></td>
	@endif
		<td>

			@if($upload->ijazah == null)
			<a class="btn btn-info btn-sm" href="{{route('upload.ijazah',$id)}}"><i class="fas fa-upload"></i></a>
			@endif
			@if($upload->ijazah != null)
			<a class="btn btn-primary btn-sm" href="{{route('upload.ijazah',$id)}}"><i class="fas fa-edit"></i></a>
			@endif
			
			<a class="btn btn-outline-primary btn-sm" href="{{$pathIjazah}}"><i class="fas fa-eye"></i></a>
		</td>
	</tr>
	<tr>
		<td>SKCK</td>
		@if($upload->skck == null)
		<td><span class="badge badge-danger">Belum Diupload</span></td>
	@endif
  	@if($upload->skck != null)
		<td><span class="badge badge-success">Sudah Diupload</span></td>
	@endif
		<td>

			@if($upload->skck == null)
			<a class="btn btn-info btn-sm" href="{{route('upload.skck',$id)}}"><i class="fas fa-upload"></i></a>
			@endif
			@if($upload->skck != null)
			<a class="btn btn-primary btn-sm" href="{{route('upload.skck',$id)}}"><i class="fas fa-edit"></i></a>
			@endif

			
			
			<a class="btn btn-outline-primary btn-sm" href="{{$skck}}"><i class="fas fa-eye"></i></a>
		</td>
	</tr>
	<tr>
		<td>Surat Kesehatan Dokter</td>
		@if($upload->skd == null)
		<td><span class="badge badge-danger">Belum Diupload</span></td>
	@endif
  	@if($upload->skd != null)
		<td><span class="badge badge-success">Sudah Diupload</span></td>
	@endif
		<td>
			@if($upload->skck == null)
				<a class="btn btn-info btn-sm" href="{{route('upload.skd',$id)}}"><i class="fas fa-upload"></i></a>
			@endif
		  	@if($upload->skck != null)
				<a class="btn btn-primary btn-sm" href="{{route('upload.skd',$id)}}"><i class="fas fa-edit"></i></a>
			@endif
			
			<a class="btn btn-outline-primary btn-sm" href="{{$skd}}"><i class="fas fa-eye"></i></a>
		</td>
	</tr>
	<tr>
		<td>CV</td>
	@if($upload->cv == null)
		<td><span class="badge badge-danger">Belum Diupload</span></td>
	@endif
  	@if($upload->cv != null)
		<td><span class="badge badge-success">Sudah Diupload</span></td>
	@endif
		<td>
		@if($upload->cv == null)
		<a class="btn btn-info btn-sm" href="{{route('upload.cv',$id)}}"><i class="fas fa-upload"></i></a>
		@endif
		@if($upload->cv != null)
		<a class="btn btn-primary btn-sm" href="{{route('upload.cv',$id)}}"><i class="fas fa-edit"></i></a>
		@endif
			<a class="btn btn-outline-primary btn-sm" href="{{$cv}}"><i class="fas fa-eye"></i></a>
		</td>
	</tr>
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