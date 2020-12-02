
@extends('layouts.userlayout')

@section('title','Dashboard')

@section('css')
  <link rel="stylesheet" href="{{asset('frontend/css/myCSS/detail.css')}}">
@endsection

@section('content')

<!-- {{$post}}
<br>
{{$pelamar->count()}}
<br>
<br>
<br>
{{simpanloker($post->id)->first()}}
<br>
<br> -->

	<div class="container">
	<h1>{{$post->user->profileCompany->name}}</h1>
		<div class="detail-loker-row-container">
			<div class="row">
				<div class="col-md desk bg-white">
					<i class="fas fa-briefcase bg-warning"></i>
					<span>Pekerjaan :</span>
					<p>{{$post->title}}</p>
				</div>
				<!-- <div class="col-md desk bg-white">
					<i class="fas fa-portrait bg-info"></i>
					<span>Sebagai :</span>
					<p>{{$post->sbg}}</p>
				</div> -->
				<div class="col-md desk bg-white">
					<i class="fas fa-graduation-cap bg-danger"></i>
					<span>Kualifikasi :</span>
					<p>{{$post->kualifikasi}}</p>
				</div>
				<div class="col-md desk bg-white">
					<i class="fas fa-map-marker-alt bg-primary"></i>
					<span>Lokasi :</span>
					<p>{{$post->lokasi}}</p>
				</div>
				<div class="col-md desk bg-white">
					<i class="fas fa-money-bill-wave-alt bg-success"></i>
					<span>Rata gaji :</span>
					<p>{{$post->min_gaji}}, {{$post->max_gaji}}</p>
				</div>
			</div>

			<div class="detail-warning">
				<h3 class="bg-info">PENGUMUMAN!! {{$post->user->profileCompany->name}}</h3>
			</div>
			<div class="detail-loker-container bg-white">
				
			<p>{{$post->deskripsi}}</p>
				@role('user')
	@if($pelamar->count() > 0)
		@if($pelamar->first()->status == 'success')
		<h1>Anda Telah diterima bekerja diperusahaan ini</h1>
		@endif
	@endif

	@if($pelamar->count() > 0)
		@if($pelamar->first()->status == 'failed')
		<h1>Mohon maaf lamaran anda ditolak</h1>
		@endif
	@endif

	@if($pelamar->count() > 0)
		@if($pelamar->first()->status == 'pending')
			<a href="{{route('lowongan-kerja.hapus',$pelamar->first()->id)}}" class="btn btn-danger btn-sm text-white">Batalkan Lamaran</a>
			<br>
		@endif
	@endif



	@if($pelamar->count() <= 0)
	<form method="POST" action="{{route('lowongan-kerja.melamar',$post->id)}}">
		@csrf
		<input type="hidden" name="company_id" value="{{$post->user_id}}">
		<input type="hidden" name="post_id" value="{{$post->user_id}}">
		<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
		<button class="btn btn-primary" onclick="confirm(' Anda melamar pekerjaan {{$post->title}} \n yang diselenggarakan oleh {{$post->user->profileCompany->name}} \n Data riwayat hidup anda akan dikirim ke perusahaan terkait \n untuk menyesuaikan kualifikasi yang dibutuhkan perusahaan terkait. \n Tunggu informasi penerimaan dari perusahaan terkait!')">Lamar Sekarang</button>
	</form>
	@endif
	<br>
	@if(simpanloker($post->id)->count() == 0)
	<form method="POST" action="{{route('simpan.loker')}}">
		@csrf
		<input type="hidden" name="post_id" value="{{$post->id}}">
		<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
		<button class="btn btn-success">Simpan lowongan kerja ke favorit</button>
	</form>
	@endif

@if(simpanloker($post->id)->count() > 0)
	<a href="{{route('nonsimpan.loker',$post->id)}}" class="btn btn-danger text-white">Batal Simpan lowongan kerja ke favorit</a>

@endif


@endrole
			</div>

		</div>
	</div>




@endsection