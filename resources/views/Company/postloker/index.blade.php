@extends('layouts.adminlte')

@section('title','management Lowongan Kerja')

@section('nama_halaman','Lowongan Kerja')



@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  
  


<div class="col-md-12">
    <div class="card card-primary card-outline">
    <div class="card-header">
    <h3 class="card-title">
    <i class="fas fa-edit"></i>
      Data postingan Lowongan Kerja
    </h3>
    </div>
    <div class="card-body pad table-responsive">
      <a class="btn btn-sm btn-success mb-3" href="{{url('management/lowongan-kerja/create')}}" id="tambahLoker"> Tambahkan lowongan Kerja</a>
    <table  class="table table-bordered table-hover table-sm data-table table-sm table-striped">
    <thead class="table-primary">
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>tanggal upload</th>
        <th>status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($post as $post)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->kategori->name}}</td>
              <td>{{$post->created_at}}</td>
              @if($post->status == 'success')
              <td><span class="badge badge-success">sudah disetujui</span></td>
              @endif
              @if($post->status == 'failed')
              <td><span class="badge badge-danger">tidak disetujui</span></td>
              @endif
              <td>
            @if($post->status == 'pending')
                  <a class="btn btn-info btn-sm" onclick="alert('postingan anda masih dalam peninjauan admin')"><i class="fas fa-eye"></i></a>
            @endif
            @if($post->status == 'success')
                  <a href="{{route('detail.lowongan-kerja',$post->slug)}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
            @endif
            @if($post->status == 'failed')
                  <a href="" class="btn btn-warning btn-sm"><i class="fas fa-info-circle"></i></a>
            @endif
                  <a href="{{route('lowongan-kerja.edit',$post->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                  <a class="btn btn-danger btn-sm"
                    onclick="event.preventDefault();
                     document.getElementById('delete').submit();"><i class="fas fa-trash"></i></a>
                      <form id="delete" action="" method="POST" class="d-none">
                  @csrf
                  @method('delete')
              </form>
              </td>
            </tr>
        @endforeach
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


@endsection