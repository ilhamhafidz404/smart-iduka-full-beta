@extends('layouts.adminlte')

@section('title','Menambahkan Perusahaan')

@section('nama_halaman','Menambahkan Perusahaan')


@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  

<div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-edit"></i> Form Tambah Perusahaan</h3>
      </div>
      <div class="card-body">
          <form class="form" action="{{route('companies.store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label>Username</label>
              <input class="form-control @error('username') is-invalid @enderror"  type="text" name="username" required>
              @error('username')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror 
            </div>
            <div class="form-group">
              <label>Email</label>
              <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" required>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror 
            </div>
            <div class="form-group">
              <label>Password</label>
              <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" autocomplete="new-password" required>
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror 
            </div>

            <div class="form-group">
              <label>Konfirmasi Password</label>
              <input class="form-control" type="password" name="password_confirmation" autocomplete="new-password" name="password" required>
            </div>
            <div class="form-group">
              <button class="btn btn-success" type="submit">Tambahkan Perusahaan</button>
            </div>
          </form>
      </div>
    </div>






</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection


<!------------------------------------ BAGIAN JAVASCRIPT ------------------------------------------>


@section('js')


      


@endsection