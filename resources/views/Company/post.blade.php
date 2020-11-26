@extends('layouts.adminlte')

@section('title','Kategori')

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
    <table  class="table table-bordered table-hover table-sm data-table table-sm">
    <thead class="table-primary">
    <tr>
      <th>No</th>
      <th>Judul</th>
      <th>Kategori</th>
      <th>tanggal upload</th>
      <th>status</th>
      <th width="300px">Action</th>
    </tr>
    </thead>
    <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
    </table>
    </div>
    <!-- /.card -->
    </div>
  </div>
   



<!------------------------- MODAL FORM CREATE AND EDIT  ---------------------------------->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="ajaxModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH LOWONGAN KERJA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formpost" name="formpost" class="form-group">
        <input type="hidden" name="post_id" id="post_id">
        <div class="form-group">
          <label for="title">Judul Lowongan Kerja</label>
          <input class="form-control" name="title" id="title" type="text">
        </div>
        <div class="form-group">
          <label>Kategori Lowongan Kerja</label>
          <select class="form-control" name="kategori_id" id="kategori_id">
            <option value="">Pilih Kategori</option>
            @foreach($Kategori as $k)
            <option value="{{$k->id}}">{{$k->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="lokasi">Lokasi Kerja</label>
          <input class="form-control" name="lokasi" id="lokasi" type="text">
        </div>
        <div class="form-group">
        <label>Minimal Kelulusan</label>
          <select class="form-control" name="kualifikasi" id="kualifikasi">
            <option value="">Pilih Kualifikasi</option>
            <option value="Diploma/D1/D2/D3">Diploma/D1/D2/D3</option>
            <option value="Doctor/S3">Doctor/S3</option>
            <option value="Master/S2">Master/S2</option>
            <option value="Sarjana/S1">Sarjana/S1</option>
            <option value="SMA/SMK/STM">SMA/SMK/STM</option>
          </select>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="min_gajimin_gaji">Gaji Minimal</label>
              <input class="form-control" name="min_gaji" id="min_gaji" type="text">
            </div>
          </div>
            <div class="col">
              <div class="form-group">
                <label for="max_gaji">Gaji Maksimal</label>
                <input class="form-control" name="max_gaji" id="max_gaji" type="text">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="deskripsi">deskripsi Lowongan Kerja</label>
          <textarea name="deskripsi" id="deskripsi">deskripsi disini</textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Tambahkan</button>
      </div>
      </form>

      
    </div>
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
  $(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('lamaran-kerja.json') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'title', name: 'title'},
            {data: 'kategori', name: 'kategori'},
            {data: 'created_at', name: 'created_at'}, 
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $('body').on('click', '.editBook', function () {
      var post_id = $(this).data('id');
      $.get("{{ route('lowongan-kerja.index') }}" +'/' + post_id +'/edit', function (data) {
          $('#modelHeading').html("Edit Book");
          $('#saveBtn').val("edit-book");
          $('#ajaxModal').modal('show');
          $('#post_id').val(data.id);
          $('#title').val(data.title);
          $('#kategori_id').val(data.kategori_id);
          $('#lokasi').val(data.lokasi);
          $('#kualifikasi').val(data.kualifikasi);
          $('#min_gaji').val(data.min_gaji);
          $('#max_gaji').val(data.max_gaji);
          $('#deskripsi').val(data.deskripsi);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
          data: $('#formpost').serialize(),
          url: "{{ route('lowongan-kerja.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#formpost').trigger("reset");
              $('#ajaxModal').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
      });
    });
    
    $('body').on('click', '.deleteBook', function () {
     
        var post_id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('lowongan-kerja.store') }}"+'/'+post_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
  });
</script>

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    var deskripsi = document.getElementById("deskripsi");
        CKEDITOR.replace(deskripsi,{
        language:'id'
      });
      CKEDITOR.config.allowedContent = true;
</script>

@endsection