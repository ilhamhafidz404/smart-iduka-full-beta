@extends('layouts.adminlte')

@section('title','management pelamar')

@section('nama_halaman','management pelamar')



@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  
    

<h1>Detail Pelamar regerg</h1>
{{$pelamar->profile}}

<h1>Detail Postingan</h1>
{{$pelamar->post}}

<a href="{{url('/management/perlamar')}}" class="btn btn-primary">Kembali</a>



</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

