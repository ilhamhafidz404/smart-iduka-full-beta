

@extends('layouts.userlayout')

@section('title','Dashboard')

@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <ul>
                <li></li>
            </ul>
        </div>
    </div>

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
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                <label>Nama Sekolah/Universitas</label>
                                <input type="text" class="form-control" name="instansi" value=""></input>
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
                            <div class="col mb-n3">
                                <span class="btn btn-sm btn-primary" id="add">
                                  <i class="fas fa-plus"></i>
                                </span>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
              </div>
              <!-- /.card-body -->
</div>
<a class="btn btn-primary" href="{{route('pendidikan.edit',auth()->user()->id)}}">Edit</a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection


@section('js')

<script type="text/javascript">
      $(document).ready(function(){
        var i = 1;
        $('#add').click(function(){
          $('#dynamic_field').append(
            '<div class="row" id="row'+i+'"><div class="col"><div class="form-group"><label>Nama Sekolah/Universitas</label><input type="text" class="form-control" name="instansi" value=""></input></div></div><div class="col"><div class="form-group"><label>Mulai Dari</label><input type="date" class="form-control" name="mulai" value=""></input></div></div><div class="col"><div class="form-group"><label>Sampai Dengan</label><input type="date" class="form-control" name="sampai" value=""></input></div></div><div class="col mb-n3"><span class="btn btn-sm btn-primary remove" id="'+i+'"><i class="fas fa-plus"></i></span></div></div>');
          
        });
        $(document).on('click','.remove',function(){
          var button_id = $(this).attr("id");
          $('#row'+button_id+'').remove();
        })
      });
    </script>

@endsection


