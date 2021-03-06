
@extends('layouts.adminlte')

@section('title','Dashboard')

@section('content')

<!-- Main content -->
<section class="content">
<div class="container-fluid">

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Profile Perusahaan</h3>
              </div>
              <div class="card-body">
                  <form>
                    <div class="form-group">
                        <img width="300px" src="{{auth()->user()->profileCompany->logo()}}">
                    </div>
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input disabled="" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$company->name}}"></input>
                         @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label>Bidang Industri</label>
                        <input disabled="" type="text" class="form-control" name="bidang" value="{{$company->bidang}}"></input>
                    </div>
                    <div class="from-group">
                        <label>Deskripsi Perusahaan</label>
                            {!! $company->deskripsi !!}
                    </div>
                    <div class="form-group">
                        <label>Nomor Kantor</label>
                        <input disabled="" type="text" class="form-control" name="office_phone" value="{{$company->office_phone}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Email Kantor</label>
                        <input disabled="" type="text" class="form-control" name="office_email" value="{{$company->office_email}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input disabled="" type="text" class="form-control" name="website" value="{{$company->website}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Email Penanggung Jawab</label>
                        <input disabled="" type="text" class="form-control" name="email_person" value="{{$company->email_person}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Kontak Penanggup Jawab</label>
                        <input disabled="" type="text" class="form-control" name="contact_person" value="{{$company->contact_person}}"></input>
                    </div>
                    <div class="from-group">
                        <label>Alamat Perusahaan</label>
                        <textarea disabled="" class="form-control" name="address">{{$company->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Twitter</label>
                        <input disabled="" type="text" class="form-control" name="twitter" value="{{$company->twitter}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Facebok</label>
                        <input disabled="" type="text" class="form-control" name="facebook" value="{{$company->facebook}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input disabled="" type="text" class="form-control" name="instagram" value="{{$company->instagram}}"></input>
                    </div>
                </form>
              </div>
            </div>
        </div>
        <div class="col">
             <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Profile Perusahaan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="POST" action="{{route('profile-perusahaan.update', $company->id)}}" class="form-group" enctype="multipart/form-data">
                 @csrf
                 @method('patch')
                    <div class="form-group">
                        <label>Logo Perusahaan</label>
                        <input type="file" name="logo">
                    </div>
                    <div class="form-group">
                        <label>Nama Perusahaan</label>
                        <input type="text" class="form-control" name="name" value="{{$company->name}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Bidang Industri</label>
                        <input type="text" class="form-control" name="bidang" value="{{$company->bidang}}"></input>
                    </div>
                    <div class="from-group">
                        <label>Deskripsi Perusahaan</label>
                        <textarea id="deskripsi" class="form-control" name="deskripsi">{{$company->deskripsi}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nomor Kantor</label>
                        <input type="text" class="form-control" name="office_phone" value="{{$company->office_phone}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Email Kantor</label>
                        <input type="text" class="form-control" name="office_email" value="{{$company->office_email}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Website</label>
                        <input type="text" class="form-control" name="website" value="{{$company->website}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Email Penanggung Jawab</label>
                        <input type="text" class="form-control" name="email_person" value="{{$company->email_person}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Kontak Penanggup Jawab</label>
                        <input type="text" class="form-control" name="contact_person" value="{{$company->contact_person}}"></input>
                    </div>
                    <div class="from-group">
                        <label>Alamat Perusahaan</label>
                        <textarea class="form-control" name="address">{{$company->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" class="form-control" name="twitter" value="{{$company->twitter}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Facebok</label>
                        <input type="text" class="form-control" name="facebook" value="{{$company->facebook}}"></input>
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" class="form-control" name="instagram" value="{{$company->instagram}}"></input>
                    </div>
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


@section('js')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    var deskripsi = document.getElementById("deskripsi");
        CKEDITOR.replace(deskripsi,{
        language:'id'
      });
      CKEDITOR.config.allowedContent = true;
</script>

@endsection



