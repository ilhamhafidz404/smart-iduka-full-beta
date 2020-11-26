@extends('layouts.adminlte')

@section('title','Data Perusahaan')

@section('nama_halaman','Data Perusahaan')


@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  

<div class="card card-primary card-outline">
      <div class="card-header">
        <a href="{{route('companies.create')}}" class="btn btn-sm btn-primary"><h3 class="card-title"><i class="fas fa-plus"></i> Tambahkan Perusahaan</h3></a>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover table-sm data-table table-striped">
         <thead>
        <tr>
          <th>No</th>
          <th>username</th>
          <th>email</th>
          <th>password</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($companies as $company)
        <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$company->username}}</td>
          <td>{{$company->email}}</td>
          <td>{{$company->password}}</td>
          <td>
            <a href="{{route('companies.edit',$company->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
            <a class="btn btn-danger btn-sm"
              onclick="event.preventDefault();
               document.getElementById('hapus-admin').submit();"><i class="fas fa-trash"></i></a>
                <form id="hapus-admin" action="{{ route('companies.destroy',$company->id) }}" method="POST" class="d-none">
            @csrf
            @method('delete')
        </form>
          </td>
        </tr>
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