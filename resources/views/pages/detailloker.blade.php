
@extends('layouts.userlayout')

@section('title','Dashboard')

@section('content')

{{$post}}
<br>
{{$pelamar->count()}}
<br>
{{$post->user_id}}
<br>
<br>
<br>
<br>

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
			<a href="{{route('lowongan-kerja.hapus',$pelamar->first()->id)}}" class="btn btn-danger btn-sm">Batalkan Lamaran</a>
		@endif
	@endif

	@if($pelamar->count() <= 0)
	<form method="POST" action="{{route('lowongan-kerja.melamar',$post->id)}}">
		@csrf
		<input type="hidden" name="company_id" value="{{$post->user_id}}">
		<input type="hidden" name="post_id" value="{{$post->user_id}}">
		<input type="hidden" name="user_id" value="{{auth()->user()->id}}">
		<button class="btn btn-primary" onclick="confirm(' Anda melamar pekerjaan {{$post->title}} \n yang diselenggarakan oleh {{$post->CompanyProfile->name}} \n Data riwayat hidup anda akan dikirim ke perusahaan terkait \n untuk menyesuaikan kualifikasi yang dibutuhkan perusahaan terkait. \n Tunggu informasi penerimaan dari perusahaan terkait!')">Lamar Sekarang</button>
	</form>
	@endif
		<br>
<form method="POST" action="">
	@csrf
	<input type="hidden" name="post_id">
	<input type="hidden" name="user_id">
	<button class="btn btn-warning">Simpan lowongan kerja</button>
</form>	
@endrole


@endsection