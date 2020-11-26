@extends('layouts.adminlte')

@section('title','management pelamar')

@section('nama_halaman','management pelamar')



@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  
    <div class="card mb-3 card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Data Pelamar Perlu Ditinjau</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover table-sm table-striped">
          <thead class="table-primary">
            <tr>
              <th>No</th>
              <th>Pelamar</th>
              <th>Lowongan Kerja</th>
              <th>Email</th>
              <th>nomor hp</th>
              <th>Tanggal melamar</th>
              <th>aksi</th>
            </tr>
          </thead>
          <tbody>
          @foreach($pelamar as $plm)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$plm->profile->name}}</td>
              <td>{{$plm->post->title}}</td>
              <td>{{$plm->profile->email}}</td>
              <td>{{$plm->profile->no_hp}}</td>
              <td>{{$plm->created_at->isoFormat('D MMMM Y')}}</td>
              <td>
                <a href="{{route('detail.perlamar',$plm->id)}}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                <a class="btn btn-sm btn-success" href="{{route('aturInterview.perlamar',$plm->id)}}"><i class="fas fa-check"></i></a>
                <a class="btn btn-sm btn-danger"
                  onclick="event.preventDefault();
               document.getElementById('failed').submit();"><i class="fas fa-times"></i></a>
                     
              </td>
                {{--<div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu" style="">
                      <a class="dropdown-item">Jadwalkan Interview</a>
                      <form action="{{route('pelamar.tolak',$plm->id)}}" method="POST">
                      @csrf
                        <button class="dropdown-item">Tolak Lamaran</button>
                      </form>
                    </div>
                  </div>--}}
                   <form id="success" action="{{route('tinjau.perlamar.post',$plm->id)}}" method="POST" class="d-none">
                      @csrf
                      <input type="hidden" name="status" value="success">
                      </form>
                      <form id="failed" action="{{route('tinjau.perlamar.post',$plm->id)}}" method="POST" class="d-none">
                      @csrf
                      <input type="hidden" name="status" value="failed">
                      </form>
          @endforeach
          </tbody>
        </table>
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
