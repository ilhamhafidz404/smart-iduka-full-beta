@extends('layouts.adminlte')

@section('title','Kategori')

@section('nama_halaman','management Loker')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  
    {{$post}}

    <form method="post" action="">
      @csrf
      <input type="hidden" name="status" value="success">
      <button class="btn btn-success" type="submit">Setujui</button>
    </form>
    <br>
    <form method="post" action="">
      @csrf
      <input type="hidden" name="status" value="failed">
      <button class="btn btn-danger" type="submit">Tolak</button>
    </form>





</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection


<!------------------------------------ BAGIAN JAVASCRIPT ------------------------------------------>


@section('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      



@endsection