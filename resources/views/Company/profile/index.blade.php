

@extends('layouts.adminlte')

@section('title','Dashboard')

@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  {{$company}}
  <a class="btn btn-primary" href="{{route('profile-perusahaan.edit',$company->id)}}">EDIT PROFILE PERUSAHAAN</a>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection


