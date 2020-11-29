@extends('layouts.adminlte')

@section('title','Data Penjadwalan Interview')

@section('nama_halaman','Data Penjadwalan Interview')



@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">
	

	<div class="col-md-12">
		<div class="card card-primary card-outline">
		<div class="card-header">
		<h3 class="card-title">
		<i class="fas fa-edit"></i>
		Belum interview
		</h3>
		</div>
		<div class="card-body">
		<table class="table table-bordered table-hover table-sm">
		<thead class="table-primary">
		<tr>
		<th>No</th>
		<th>Pelamar</th>
		<th>Lowongan Kerja</th>
		<th>Tempat Interview</th>
		<th colspan="2">Jadwal interview</th>
		<th>Status</th>
		<th>tinjau</th>
		</tr>
		</thead>
		<tbody>
				@foreach($invwPending as $invp)
				<tr>
				<td>{{$loop->iteration}}</td>
				<td><a href="{{route('detail.perlamar',$invp->pelamar_id)}}" style="color:black;">{{$invp->pelamar->profile->name}}</a></td>
				<td>{{$invp->pelamar->post->title}}</td>
				<td>{{$invp->tempat}}</td>
				<td>{{$invp->waktu}}</td>
				<td>{{$invp->tanggal}}</td>
				@if($invp->status == 'pending')
				<td>Belum Interview</td>
				@endif
				<td>
				<form action="{{route('doneInverview',$invp->id)}}" method="post">
					@csrf
					<button class="btn btn-sm btn-success"><i class="fas fa-check"></i> </button>
				</form>
				</td>
				@endforeach

		</tbody>
		</table>
		</div>
		<!-- /.card -->
		</div>
	</div>
	<br> <br>
	<div class="col-md-12">
		<div class="card card-primary card-outline">
		<div class="card-header">
		<h3 class="card-title">
		<i class="fas fa-edit"></i>
		Sudah Interview
		</h3>
		</div>
		<div class="card-body">
		<table class="table1 table-bordered table-hover table-sm">
		<thead class="table-primary">
		<tr>
		<th>No</th>
		<th>Pelamar</th>
		<th>Lowongan Kerja</th>
		<th>Tempat Interview</th>
		<th colspan="2">Jadwal interview</th>
		<th>Status</th>
		<th>Keputusan</th>
		</tr>
		</thead>
		<tbody>
				@foreach($invwSuccess as $invs)
				@if($invs->pelamar->status == 'process')
				<tr>
				<td>{{$loop->iteration}}</td>
				<td><a href="{{route('detail.perlamar',$invs->pelamar_id)}}" style="color:black;">{{$invs->pelamar->profile->name}}</a></td>
				<td>{{$invs->pelamar->post->title}}</td>
				<td>{{$invs->tempat}}</td>
				<td>{{$invs->waktu}}</td>
				<td>{{$invs->tanggal}}</td>
				@if($invs->status == 'success')
				<td>Sudah Interview</td>
				@endif
				<td>
					<a class="btn btn-sm btn-success"
                  onclick="event.preventDefault();
               document.getElementById('success').submit();" title="meloloskan pelamar"><i class="fas fa-check"></i></a>
               <a class="btn btn-sm btn-danger"
                  onclick="event.preventDefault();
               document.getElementById('failed').submit();" title="tidak meloloskan pelamar"><i class="fas fa-times"></i></a>
				</td>

				<form id="success" action="{{route('keputusanAkhir',$invs->pelamar_id)}}" method="POST" class="d-none" style="display: none;">
                      @csrf
                      <input type="hidden" name="status" value="success">
                      </form>
                      <form action="{{route('keputusanAkhir',$invs->pelamar_id)}}" method="POST" class="d-none" style="display: none;">
                      @csrf
                      <input id="failed" type="hidden" name="status" value="failed">
                      </form>
				@endif
				@endforeach
			</tr>
		</tbody>
		</table>
		</div>
		<!-- /.card -->
		</div>
	</div>



</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection


<!------------------------------------ BAGIAN JAVASCRIPT ------------------------------------------>


@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('.table').DataTable();
  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.table1').DataTable();
  })
</script>
@endsection
