

@extends('layouts.userlayout')

@section('title','Dashboard')

@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Profile Saya</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                    <form method="POST" action="{{route('pendidikan.store')}}" class="form-group" enctype="multipart/form-data" id="dynamic_field">
                        @csrf
                        @foreach($pendidikan as $pnd)
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                <label>Nama Sekolah/Universitas</label>
                                <input type="text" class="form-control" name="instansi" value="{{}}"></input>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <label>Mulai Dari</label>
                                <input type="date" class="form-control" name="mulai" value=""></input>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <label>Sampai Dengan</label>
                                <input type="date" class="form-control" name="sampai" value=""></input>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="form-group mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
              </div>
              <!-- /.card-body -->
</div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection




