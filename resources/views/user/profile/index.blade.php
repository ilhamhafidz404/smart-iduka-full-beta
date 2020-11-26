

@extends('layouts.userlayout')

@section('title','Dashboard')

@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  {{$profile}}
  <a class="btn btn-primary" href="{{route('profile.edit',$profile->id)}}">EDIT PROFILE</a>
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection


