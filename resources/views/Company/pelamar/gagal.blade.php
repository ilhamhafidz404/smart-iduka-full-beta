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
