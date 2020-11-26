@extends('layouts.adminlte')

@section('title','Tinjau pelamar')

@section('nama_halaman','Tinjau pelamar')



@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  
    

<h1>Detail Pelamar</h1>
{{$pelamar->profile}}

<form action="{{route('tinjau.perlamar.post',$pelamar->id)}}" method="POST">
	@csrf
	<input type="hidden" name="status" value="success">
	<button type="submit" class="btn btn-success">TERIMA</button>
</form>
  
	<br>

<form action="{{route('tinjau.perlamar.post',$pelamar->id)}}" method="POST">
	@csrf
	<input type="hidden" name="status" value="success">
	<button type="submit" class="btn btn-danger">TOLAK</button>
</form>

	<br>

<a href="{{url('/management/perlamar')}}" class="btn btn-primary">Kembali</a>



</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

